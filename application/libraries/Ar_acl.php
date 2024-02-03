<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Ar_acl
 *
 * Access control library
 *
 * @package         Ar_acl
 * @author          Ardinoto Wahono
 * @version         1.0.0
 * @copyright        Copyright (c) 2009 Ardinoto Wahono
 * @copyright        Copyright (c) Wiredesignz & Maxximus 2009-10-03
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

class Ar_acl
{
    function __construct()
    {
        $this->ci =& get_instance();
        $this->ci->load->helper('url');
        $this->ci->load->library('session');
        $this->ci->load->config('ar_acl');
        $this->ci->load->helper('string');

        // Clear error_uri session
        $this->ci->session->unset_userdata('error_uri');

        // Auto check ACL
        $this->check_acl();
    }

    /**
     * check_acl
     * Ar_acl control logic
     * @return	bool
     * 
     */
    function check_acl()
    {
        $current_page = $this->current_uri();
        $role_id = ($this->get_role_id()) ? $this->get_role_id() : $this->ci->config->item('default_role');
        $config_page = $this->ci->config->item('page_control');
        $config_vpp_page = $this->ci->config->item('vpp_control');
        if ( $this->get_role_id()  ==  1)
        {
            return;
        }
        elseif ($this->is_allowed($current_page, $role_id, $config_page, $config_vpp_page))
        {
            return;
        }
        else
        {
            $error_uri = $this->ci->session->userdata('error_uri');
            redirect($error_uri, 'refresh');
        }
    }

    /**
     * Ar_acl general check
     *
     * @return	bool
     */
    function is_allowed($current_page, $role_id, $config_page, $config_vpp_page)
    {
        log_message('debug', "AR_ACL -> You're trying to access this page: ".$current_page);
        log_message('debug', "AR_ACL -> Your role_id is: ".$role_id);
        $filter_page = trim($this->segments_filter($current_page, $config_page, $config_vpp_page));
        if ($filter_page)
        {
            log_message('debug', "AR_ACL -> FILTER PAGE return TRUE");
            if (isset($config_page[$filter_page]['allowed']))
            {
                log_message('debug', "AR_ACL -> FILTER PAGE INSIDE THE FIRST ISSET");
                if (in_array($role_id, $config_page[$filter_page]['allowed']))
                {
                    log_message('debug', "AR_ACL -> This page is controlled. But you CAN access.");
                    return TRUE;
                }
                log_message('debug', "AR_ACL -> READY TO ENTER SECOND ISSET");
            }
            if (isset($config_vpp_page[$filter_page]['allowed']))
            {
                log_message('debug', "AR_ACL -> FILTER PAGE INSIDE THE SECOND ISSET");
                if (in_array($role_id, $config_vpp_page[$filter_page]['allowed']))
                {
                    log_message('debug', "AR_ACL -> This page is VPP controlled. You're ROLE IS ACCEPTED.");
                    
                    // Run function to check vpp
                    if ($this->vpp_check($config_vpp_page, $filter_page))
                    {
                        log_message('debug', "AR_ACL -> This page is VPP controlled. You're VPP IS ACCEPTED.");
                        return TRUE;
                    }
                    else
                    {
                        log_message('debug', "AR_ACL -> This page is VPP controlled. But SORRY you CAN'T access.");
                        log_message('debug', "AR_ACL -> ERROR_URI: ".$config_vpp_page[$filter_page]['error_uri']);
                        log_message('debug', "AR_ACL -> ERROR_MSG: ".$config_vpp_page[$filter_page]['error_msg']);
                        $this->ci->session->set_userdata('error_uri', $config_vpp_page[$filter_page]['error_uri']);
                        $this->ci->session->set_flashdata('error_msg', $config_vpp_page[$filter_page]['error_msg']);
                        return FALSE;
                    }
                }
                else
                {
                    log_message('debug', "AR_ACL -> This page is VPP controlled. But SORRY you CAN'T access.");
                    log_message('debug', "AR_ACL -> ERROR_URI: ".$config_vpp_page[$filter_page]['error_uri']);
                    log_message('debug', "AR_ACL -> ERROR_MSG: ".$config_vpp_page[$filter_page]['error_msg']);
                    $this->ci->session->set_userdata('error_uri', $config_vpp_page[$filter_page]['error_uri']);
                    $this->ci->session->set_flashdata('error_msg', $config_vpp_page[$filter_page]['error_msg']);
                    return FALSE;
                }
            }
            else
            {
                log_message('debug', "AR_ACL -> This page is controlled. But SORRY you CAN'T access.");
                $this->ci->session->set_userdata('error_uri', $config_page[$filter_page]['error_uri']);
                $this->ci->session->set_flashdata('error_msg', $config_page[$filter_page]['error_msg']);
                return FALSE;
            }
        }
        else
        {
            log_message('debug', 'AR_ACL -> This page is UNCONTROLLED');
            return TRUE;
        }
    }

    /**
     * Get role_id
     *
     * @return	string
     */
    function get_role_id()
    {
        log_message('debug', 'AR_ACL -> get_role_id INITIALIZED');
        
        // For example
        // return 2;
        return $this->ci->session->userdata($this->ci->config->item('sess_role_var'));
    }

    /**
     * Get key id from session
     * In common, key id is user_id or username
     *
     * @return	string
     */
    function get_key_id_sess($config_vpp_page, $filter_page)
    {
        log_message('debug', 'AR_ACL -> get_key_id_sess INITIALIZED');
        
        // For example
        // return 15;
        return $this->ci->session->userdata($config_vpp_page[$filter_page]['vpp_sess_name']);

    }

    /**
     * Get is_admin
     *
     * @return	bool
     */
    function is_admin()
    {
        if ($this->get_role_id() == 1)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    /**
     * Get current_uri
     * Also remove index or index.php from uri
     *
     * @return	string
     */
    function current_uri($uri = '')
    {
        $segments = $this->ci->uri->segment_array();

        // Remove index and index.php from array
        $segments = array_diff($segments, array('index', 'index.php'));

        // Reindex array
        $segments = array_values($segments);

        foreach ($segments as $segment)
        {
            $uri .= $segment.'/';
        }
        return $uri;
    }

    /**
     * Filter current uri so that sub module or sub controller also can be controlled
     *
     * @return	string bool
     */
    function segments_filter($current_page, $config_page, $config_vpp_page)
    {
        log_message('debug', 'AR_ACL -> segments_filter INITIALIZED');
        if (array_key_exists($current_page, $config_page))
        {
            log_message('debug', 'AR_ACL -> DIRECT DETECTION');
            return $current_page;
        }
        else
        {
            $segments = explode("/", $current_page);
            $filter_check_uri = "";
            $true_val = array();
            for ($i = 1; $i <= $this->ci->config->item('segment_max'); $i++)
            {
                $segment_num = $i - 1;
                if (isset($segments[$segment_num]))
                {
                    $filter_check_uri .= $segments[$segment_num].'/';
                }
                log_message('debug', 'AR_ACL -> CHECKED URI: '.$filter_check_uri );
                if (array_key_exists(trim($filter_check_uri), $config_page))
                {
                    $true_val[] = $filter_check_uri;
                    log_message('debug', 'AR_ACL -> FOUND THE PAGE THAT SHOULD BE CONTROLLED');
                }
                /*if (array_key_exists(trim($filter_check_uri), $config_vpp_page))
                {
                    $true_val[] = $filter_check_uri;
                    log_message('debug', 'AR_ACL -> FOUND THE VPP PAGE THAT SHOULD BE CONTROLLED');
                }*/
            }
            if (end($true_val))
            {
                $filter_page = trim(end($true_val));
                log_message('debug', 'AR_ACL -> THIS URI IS NEED TO BE CONTROLLED: '.$filter_page);
                return $filter_page;
            }
        }
        return FALSE;
    }

    /**
     * vpp_check
     * Compare key id session with key id from uri
     *
     * @return	bool
     */
    function vpp_check($config_vpp_page, $filter_page)
    {
        $key_id_sess = $this->get_key_id_sess($config_vpp_page, $filter_page);
        $key_segment_num = $config_vpp_page[$filter_page]['vpp_key'];
        $key_id_page =  $this->ci->uri->segment($key_segment_num);
        if ($key_id_page == $key_id_sess)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
}

?>