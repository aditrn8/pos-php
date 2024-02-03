<?php

if( !function_exists('gen_paging')) {
	function gen_paging($page_data = array()) {
		$page_result = '';
		
		$func_name = 'pageLoad';

		$count = 1;
		
		if(isset($page_data['load_func_name'])) {
			if($page_data['load_func_name'])
				$func_name = $page_data['load_func_name'];
		}
		
		if($page_data['count_row'] > 1)
			$count = ceil($page_data['count_row']/$page_data['limit']);
		
		$page_result .= '<ul class="pagination pagination-sm no-margin pull-right">
							<li ' . ( $page_data['current'] == 1 ? 'class="active"' : '' ) . '><a href="javascript:void(0)" ' . ($page_data['current'] == 1 ? '' : 'onclick = "'.$func_name.'(1)"') .' >&laquo; First</a></li>';
		
		$paging_show 	= 3;
		$page_start		= $page_data['current'] - $paging_show;
		$page_start		= $page_start < 1 ? 1 : $page_start;
		
		$page_end		= $page_data['current'] + $paging_show;
		$page_end		= $count > $page_end ? $page_end : $count;
		$page_end		= $count > 1 ? $page_end : 1;
		
		if($page_start > 1)
			$page_result .= '<li class="active"><a href="javascript:void(0)">...</a></li>';
		
		for($i=$page_start ; $i<=$page_end; $i++) {
			$page_result .= '<li '.($page_data['current'] == $i ? 'class="active"' : '').'><a href="javascript:void(0)" '.($page_data['current'] == $i ? "" : 'onclick="'.$func_name.'('.$i.')"').'>'.$i.'</a></li>';
			
		}
		
		if($count > $page_end)
			$page_result .= '<li class="active"><a href="javascript:void(0)">...</a></li>';
		
		$page_result .= '<li ' . ( $page_data['current'] == $page_end ? 'class="active"' : '' ) . '><a href="javascript:void(0)" onclick = "'.$func_name.'('.$count.')">Last &raquo;</a></li>';
		$page_result .='</ul>';
		
		return $page_result;
	}
}