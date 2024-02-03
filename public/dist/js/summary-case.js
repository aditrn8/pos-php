//Flot Pie Chart keseluruhan
$(function () {

    var all_summary = [{
        label: "Jaringan",
        data: <?php echo 0 + $c_jaringan->total; ?>
    }, {
        label: "EDC Bermasalah",
        data: <?php echo 0 + $c_edc->total; ?>
    }, {
        label: "Paper Roll",
        data: <?php echo 0 + $c_paper->total; ?>
    }, {
        label: "Permintaan Ganti Mesin",
        data: <?php echo 0 + $c_mesin->total; ?>
    },{
        label: "Data EDC Bermasalah",
        data: <?php echo 0 + $c_data->total; ?>
    },{
        label: "Permintaan Tambah Fasilitas",
        data: <?php echo 0 + $c_tambah->total; ?>
    },{
        label: "Others",
        data: <?php echo 0 + $c_others->total; ?>
    }];

    var plotObj = $.plot($("#summary_all_case"), all_summary, {
        series: {
            pie: {
                show: true
            }
        },
        legend: {
            show: false
        },
        grid: {
            hoverable: true
        },
        tooltip: true,
        tooltipOpts: {
            content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
            shifts: {
                x: 20,
                y: 0
            },
            defaultTheme: false
        }
    });

});

//Flot Pie Chart GI
$(function () {

    var all_summary = [{
        label: "Jaringan",
        data: 4
    }, {
        label: "EDC Bermasalah",
        data: 4
    }, {
        label: "Paper Roll",
        data: 4
    }, {
        label: "Permintaan Ganti Mesin",
        data: 4
    },{
        label: "Data EDC Bermasalah",
        data: 4
    },{
        label: "Permintaan Tambah Fasilitas",
        data: 4
    },{
        label: "Others",
        data: 4
    }];

    var plotObj = $.plot($("#summary_gi"), all_summary, {
        series: {
            pie: {
                show: true
            }
        },
        legend: {
            show: false
        },
        grid: {
            hoverable: true
        },
        tooltip: true,
        tooltipOpts: {
            content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
            shifts: {
                x: 20,
                y: 0
            },
            defaultTheme: false
        }
    });

});

//Flot Pie Chart PP
$(function () {

    var all_summary = [{
        label: "Jaringan",
        data: <?php echo 0 + $c_jaringan->total; ?>
    }, {
        label: "EDC Bermasalah",
        data: <?php echo 0 + $c_edc->total; ?>
    }, {
        label: "Paper Roll",
        data: <?php echo 0 + $c_paper->total; ?>
    }, {
        label: "Permintaan Ganti Mesin",
        data: <?php echo 0 + $c_mesin->total; ?>
    },{
        label: "Data EDC Bermasalah",
        data: <?php echo 0 + $c_data->total; ?>
    },{
        label: "Permintaan Tambah Fasilitas",
        data: <?php echo 0 + $c_tambah->total; ?>
    },{
        label: "Others",
        data: <?php echo 0 + $c_others->total; ?>
    }];

    var plotObj = $.plot($("#summary_pp"), all_summary, {
        series: {
            pie: {
                show: true
            }
        },
        legend: {
            show: false
        },
        grid: {
            hoverable: true
        },
        tooltip: true,
        tooltipOpts: {
            content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
            shifts: {
                x: 20,
                y: 0
            },
            defaultTheme: false
        }
    });

});

//Flot Pie Chart PI
$(function () {

    var all_summary = [{
        label: "Jaringan",
        data: 4
    }, {
        label: "EDC Bermasalah",
        data: 4
    }, {
        label: "Paper Roll",
        data: 4
    }, {
        label: "Permintaan Ganti Mesin",
        data: 4
    },{
        label: "Data EDC Bermasalah",
        data: 4
    },{
        label: "Permintaan Tambah Fasilitas",
        data: 4
    },{
        label: "Others",
        data: 4
    }];

    var plotObj = $.plot($("#summary_pi"), all_summary, {
        series: {
            pie: {
                show: true
            }
        },
        legend: {
            show: false
        },
        grid: {
            hoverable: true
        },
        tooltip: true,
        tooltipOpts: {
            content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
            shifts: {
                x: 20,
                y: 0
            },
            defaultTheme: false
        }
    });

});

//Flot Pie Chart Kokas
$(function () {

    var all_summary = [{
        label: "Jaringan",
        data: <?php echo 0 + $c_jaringan->total; ?>
    }, {
        label: "EDC Bermasalah",
        data: <?php echo 0 + $c_edc->total; ?>
    }, {
        label: "Paper Roll",
        data: <?php echo 0 + $c_paper->total; ?>
    }, {
        label: "Permintaan Ganti Mesin",
        data: <?php echo 0 + $c_mesin->total; ?>
    },{
        label: "Data EDC Bermasalah",
        data: <?php echo 0 + $c_data->total; ?>
    },{
        label: "Permintaan Tambah Fasilitas",
        data: <?php echo 0 + $c_tambah->total; ?>
    },{
        label: "Others",
        data: <?php echo 0 + $c_others->total; ?>
    }];

    var plotObj = $.plot($("#summary_kokas"), all_summary, {
        series: {
            pie: {
                show: true
            }
        },
        legend: {
            show: false
        },
        grid: {
            hoverable: true
        },
        tooltip: true,
        tooltipOpts: {
            content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
            shifts: {
                x: 20,
                y: 0
            },
            defaultTheme: false
        }
    });

});

//Flot Pie Chart PS
$(function () {

    var all_summary = [{
        label: "Jaringan",
        data: 4
    }, {
        label: "EDC Bermasalah",
        data: 4
    }, {
        label: "Paper Roll",
        data: 4
    }, {
        label: "Permintaan Ganti Mesin",
        data: 4
    },{
        label: "Data EDC Bermasalah",
        data: 4
    },{
        label: "Permintaan Tambah Fasilitas",
        data: 4
    },{
        label: "Others",
        data: 4
    }];

    var plotObj = $.plot($("#summary_ps"), all_summary, {
        series: {
            pie: {
                show: true
            }
        },
        legend: {
            show: false
        },
        grid: {
            hoverable: true
        },
        tooltip: true,
        tooltipOpts: {
            content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
            shifts: {
                x: 20,
                y: 0
            },
            defaultTheme: false
        }
    });

});

//Flot Pie Chart Senci
$(function () {

    var all_summary = [{
        label: "Jaringan",
        data: <?php echo 0 + $c_jaringan->total; ?>
    }, {
        label: "EDC Bermasalah",
        data: <?php echo 0 + $c_edc->total; ?>
    }, {
        label: "Paper Roll",
        data: <?php echo 0 + $c_paper->total; ?>
    }, {
        label: "Permintaan Ganti Mesin",
        data: <?php echo 0 + $c_mesin->total; ?>
    },{
        label: "Data EDC Bermasalah",
        data: <?php echo 0 + $c_data->total; ?>
    },{
        label: "Permintaan Tambah Fasilitas",
        data: <?php echo 0 + $c_tambah->total; ?>
    },{
        label: "Others",
        data: <?php echo 0 + $c_others->total; ?>
    }];

    var plotObj = $.plot($("#summary_senci"), all_summary, {
        series: {
            pie: {
                show: true
            }
        },
        legend: {
            show: false
        },
        grid: {
            hoverable: true
        },
        tooltip: true,
        tooltipOpts: {
            content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
            shifts: {
                x: 20,
                y: 0
            },
            defaultTheme: false
        }
    });

});

//Flot Pie Chart Emporium
$(function () {

    var all_summary = [{
        label: "Jaringan",
        data: 4
    }, {
        label: "EDC Bermasalah",
        data: 4
    }, {
        label: "Paper Roll",
        data: 4
    }, {
        label: "Permintaan Ganti Mesin",
        data: 4
    },{
        label: "Data EDC Bermasalah",
        data: 4
    },{
        label: "Permintaan Tambah Fasilitas",
        data: 4
    },{
        label: "Others",
        data: 4
    }];

    var plotObj = $.plot($("#summary_emporium"), all_summary, {
        series: {
            pie: {
                show: true
            }
        },
        legend: {
            show: false
        },
        grid: {
            hoverable: true
        },
        tooltip: true,
        tooltipOpts: {
            content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
            shifts: {
                x: 20,
                y: 0
            },
            defaultTheme: false
        }
    });

});

//Flot Pie Chart mkg
$(function () {

    var all_summary = [{
        label: "Jaringan",
        data: <?php echo 0 + $c_jaringan->total; ?>
    }, {
        label: "EDC Bermasalah",
        data: <?php echo 0 + $c_edc->total; ?>
    }, {
        label: "Paper Roll",
        data: <?php echo 0 + $c_paper->total; ?>
    }, {
        label: "Permintaan Ganti Mesin",
        data: <?php echo 0 + $c_mesin->total; ?>
    },{
        label: "Data EDC Bermasalah",
        data: <?php echo 0 + $c_data->total; ?>
    },{
        label: "Permintaan Tambah Fasilitas",
        data: <?php echo 0 + $c_tambah->total; ?>
    },{
        label: "Others",
        data: <?php echo 0 + $c_others->total; ?>
    }];

    var plotObj = $.plot($("#summary_mkg"), all_summary, {
        series: {
            pie: {
                show: true
            }
        },
        legend: {
            show: false
        },
        grid: {
            hoverable: true
        },
        tooltip: true,
        tooltipOpts: {
            content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
            shifts: {
                x: 20,
                y: 0
            },
            defaultTheme: false
        }
    });

});

//Flot Pie Chart smb
$(function () {

    var all_summary = [{
        label: "Jaringan",
        data: 4
    }, {
        label: "EDC Bermasalah",
        data: 4
    }, {
        label: "Paper Roll",
        data: 4
    }, {
        label: "Permintaan Ganti Mesin",
        data: 4
    },{
        label: "Data EDC Bermasalah",
        data: 4
    },{
        label: "Permintaan Tambah Fasilitas",
        data: 4
    },{
        label: "Others",
        data: 4
    }];

    var plotObj = $.plot($("#summary_smb"), all_summary, {
        series: {
            pie: {
                show: true
            }
        },
        legend: {
            show: false
        },
        grid: {
            hoverable: true
        },
        tooltip: true,
        tooltipOpts: {
            content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
            shifts: {
                x: 20,
                y: 0
            },
            defaultTheme: false
        }
    });

});

//Flot Pie Chart aeon
$(function () {

    var all_summary = [{
        label: "Jaringan",
        data: <?php echo 0 + $c_jaringan->total; ?>
    }, {
        label: "EDC Bermasalah",
        data: <?php echo 0 + $c_edc->total; ?>
    }, {
        label: "Paper Roll",
        data: <?php echo 0 + $c_paper->total; ?>
    }, {
        label: "Permintaan Ganti Mesin",
        data: <?php echo 0 + $c_mesin->total; ?>
    },{
        label: "Data EDC Bermasalah",
        data: <?php echo 0 + $c_data->total; ?>
    },{
        label: "Permintaan Tambah Fasilitas",
        data: <?php echo 0 + $c_tambah->total; ?>
    },{
        label: "Others",
        data: <?php echo 0 + $c_others->total; ?>
    }];

    var plotObj = $.plot($("#summary_aeon"), all_summary, {
        series: {
            pie: {
                show: true
            }
        },
        legend: {
            show: false
        },
        grid: {
            hoverable: true
        },
        tooltip: true,
        tooltipOpts: {
            content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
            shifts: {
                x: 20,
                y: 0
            },
            defaultTheme: false
        }
    });

});

//Flot Pie Chart lipkar
$(function () {

    var all_summary = [{
        label: "Jaringan",
        data: 4
    }, {
        label: "EDC Bermasalah",
        data: 4
    }, {
        label: "Paper Roll",
        data: 4
    }, {
        label: "Permintaan Ganti Mesin",
        data: 4
    },{
        label: "Data EDC Bermasalah",
        data: 4
    },{
        label: "Permintaan Tambah Fasilitas",
        data: 4
    },{
        label: "Others",
        data: 4
    }];

    var plotObj = $.plot($("#summary_lipkar"), all_summary, {
        series: {
            pie: {
                show: true
            }
        },
        legend: {
            show: false
        },
        grid: {
            hoverable: true
        },
        tooltip: true,
        tooltipOpts: {
            content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
            shifts: {
                x: 20,
                y: 0
            },
            defaultTheme: false
        }
    });

});

//Flot Pie Chart sms
$(function () {

    var all_summary = [{
        label: "Jaringan",
        data: <?php echo 0 + $c_jaringan->total; ?>
    }, {
        label: "EDC Bermasalah",
        data: <?php echo 0 + $c_edc->total; ?>
    }, {
        label: "Paper Roll",
        data: <?php echo 0 + $c_paper->total; ?>
    }, {
        label: "Permintaan Ganti Mesin",
        data: <?php echo 0 + $c_mesin->total; ?>
    },{
        label: "Data EDC Bermasalah",
        data: <?php echo 0 + $c_data->total; ?>
    },{
        label: "Permintaan Tambah Fasilitas",
        data: <?php echo 0 + $c_tambah->total; ?>
    },{
        label: "Others",
        data: <?php echo 0 + $c_others->total; ?>
    }];

    var plotObj = $.plot($("#summary_sms"), all_summary, {
        series: {
            pie: {
                show: true
            }
        },
        legend: {
            show: false
        },
        grid: {
            hoverable: true
        },
        tooltip: true,
        tooltipOpts: {
            content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
            shifts: {
                x: 20,
                y: 0
            },
            defaultTheme: false
        }
    });

});

//Flot Pie Chart gancit
$(function () {

    var all_summary = [{
        label: "Jaringan",
        data: 4
    }, {
        label: "EDC Bermasalah",
        data: 4
    }, {
        label: "Paper Roll",
        data: 4
    }, {
        label: "Permintaan Ganti Mesin",
        data: 4
    },{
        label: "Data EDC Bermasalah",
        data: 4
    },{
        label: "Permintaan Tambah Fasilitas",
        data: 4
    },{
        label: "Others",
        data: 4
    }];

    var plotObj = $.plot($("#summary_gancit"), all_summary, {
        series: {
            pie: {
                show: true
            }
        },
        legend: {
            show: false
        },
        grid: {
            hoverable: true
        },
        tooltip: true,
        tooltipOpts: {
            content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
            shifts: {
                x: 20,
                y: 0
            },
            defaultTheme: false
        }
    });

});

//Flot Pie Chart pim
$(function () {

    var all_summary = [{
        label: "Jaringan",
        data: <?php echo 0 + $c_jaringan->total; ?>
    }, {
        label: "EDC Bermasalah",
        data: <?php echo 0 + $c_edc->total; ?>
    }, {
        label: "Paper Roll",
        data: <?php echo 0 + $c_paper->total; ?>
    }, {
        label: "Permintaan Ganti Mesin",
        data: <?php echo 0 + $c_mesin->total; ?>
    },{
        label: "Data EDC Bermasalah",
        data: <?php echo 0 + $c_data->total; ?>
    },{
        label: "Permintaan Tambah Fasilitas",
        data: <?php echo 0 + $c_tambah->total; ?>
    },{
        label: "Others",
        data: <?php echo 0 + $c_others->total; ?>
    }];

    var plotObj = $.plot($("#summary_pim"), all_summary, {
        series: {
            pie: {
                show: true
            }
        },
        legend: {
            show: false
        },
        grid: {
            hoverable: true
        },
        tooltip: true,
        tooltipOpts: {
            content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
            shifts: {
                x: 20,
                y: 0
            },
            defaultTheme: false
        }
    });

});

//Flot Pie Chart setiabudi
$(function () {

    var all_summary = [{
        label: "Jaringan",
        data: <?php echo 0 + $c_jaringan->total; ?>
    }, {
        label: "EDC Bermasalah",
        data: <?php echo 0 + $c_edc->total; ?>
    }, {
        label: "Paper Roll",
        data: <?php echo 0 + $c_paper->total; ?>
    }, {
        label: "Permintaan Ganti Mesin",
        data: <?php echo 0 + $c_mesin->total; ?>
    },{
        label: "Data EDC Bermasalah",
        data: <?php echo 0 + $c_data->total; ?>
    },{
        label: "Permintaan Tambah Fasilitas",
        data: <?php echo 0 + $c_tambah->total; ?>
    },{
        label: "Others",
        data: <?php echo 0 + $c_others->total; ?>
    }];

    var plotObj = $.plot($("#summary_setiabudi"), all_summary, {
        series: {
            pie: {
                show: true
            }
        },
        legend: {
            show: false
        },
        grid: {
            hoverable: true
        },
        tooltip: true,
        tooltipOpts: {
            content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
            shifts: {
                x: 20,
                y: 0
            },
            defaultTheme: false
        }
    });

});

    function display_mall(){
        if(document.getElementById("nama_mall").value=='SELURUH MALL'){
            document.getElementById("all_mall").style.display="block";
            document.getElementById("tabel1").style.display="block";
            document.getElementById("gi").style.display="none";
            document.getElementById("tabel2").style.display="none";
            document.getElementById("pp").style.display="none";
            document.getElementById("tabel3").style.display="none";
            document.getElementById("pi").style.display="none";
            document.getElementById("tabel4").style.display="none";
            document.getElementById("kokas").style.display="none";
            document.getElementById("tabel5").style.display="none";
            document.getElementById("ps").style.display="none";
            document.getElementById("tabel6").style.display="none";
            document.getElementById("senci").style.display="none";
            document.getElementById("tabel7").style.display="none";
            document.getElementById("emporium").style.display="none";
            document.getElementById("tabel8").style.display="none";
            document.getElementById("mkg").style.display="none";
            document.getElementById("tabel9").style.display="none";
            document.getElementById("smb").style.display="none";
            document.getElementById("tabel10").style.display="none";
            document.getElementById("aeon").style.display="none";
            document.getElementById("tabel11").style.display="none";
            document.getElementById("lipkar").style.display="none";
            document.getElementById("tabel12").style.display="none";
            document.getElementById("sms").style.display="none";
            document.getElementById("tabel13").style.display="none";
            document.getElementById("gancit").style.display="none";
            document.getElementById("tabel14").style.display="none";
            document.getElementById("pim").style.display="none";
            document.getElementById("tabel15").style.display="none";
            document.getElementById("setiabudi").style.display="none";
            document.getElementById("tabel16").style.display="none";        
        }
        else if(document.getElementById("nama_mall").value=='GRAND INDONESIA'){
            document.getElementById("all_mall").style.display="none";
            document.getElementById("tabel1").style.display="none";
            document.getElementById("gi").style.display="block";
            document.getElementById("tabel2").style.display="block";
            document.getElementById("pp").style.display="none";
            document.getElementById("tabel3").style.display="none";
            document.getElementById("pi").style.display="none";
            document.getElementById("tabel4").style.display="none";
            document.getElementById("kokas").style.display="none";
            document.getElementById("tabel5").style.display="none";
            document.getElementById("ps").style.display="none";
            document.getElementById("tabel6").style.display="none";
            document.getElementById("senci").style.display="none";
            document.getElementById("tabel7").style.display="none";
            document.getElementById("emporium").style.display="none";
            document.getElementById("tabel8").style.display="none";
            document.getElementById("mkg").style.display="none";
            document.getElementById("tabel9").style.display="none";
            document.getElementById("smb").style.display="none";
            document.getElementById("tabel10").style.display="none";
            document.getElementById("aeon").style.display="none";
            document.getElementById("tabel11").style.display="none";
            document.getElementById("lipkar").style.display="none";
            document.getElementById("tabel12").style.display="none";
            document.getElementById("sms").style.display="none";
            document.getElementById("tabel13").style.display="none";
            document.getElementById("gancit").style.display="none";
            document.getElementById("tabel14").style.display="none";
            document.getElementById("pim").style.display="none";
            document.getElementById("tabel15").style.display="none";
            document.getElementById("setiabudi").style.display="none";
            document.getElementById("tabel16").style.display="none";
        }
        else if(document.getElementById("nama_mall").value=='PASIFIC PLACE'){
            document.getElementById("all_mall").style.display="none";
            document.getElementById("tabel1").style.display="none";
            document.getElementById("gi").style.display="none";
            document.getElementById("tabel2").style.display="none";
            document.getElementById("pp").style.display="block";
            document.getElementById("tabel3").style.display="block";
            document.getElementById("pi").style.display="none";
            document.getElementById("tabel4").style.display="none";
            document.getElementById("kokas").style.display="none";
            document.getElementById("tabel5").style.display="none";
            document.getElementById("ps").style.display="none";
            document.getElementById("tabel6").style.display="none";
            document.getElementById("senci").style.display="none";
            document.getElementById("tabel7").style.display="none";
            document.getElementById("emporium").style.display="none";
            document.getElementById("tabel8").style.display="none";
            document.getElementById("mkg").style.display="none";
            document.getElementById("tabel9").style.display="none";
            document.getElementById("smb").style.display="none";
            document.getElementById("tabel10").style.display="none";
            document.getElementById("aeon").style.display="none";
            document.getElementById("tabel11").style.display="none";
            document.getElementById("lipkar").style.display="none";
            document.getElementById("tabel12").style.display="none";
            document.getElementById("sms").style.display="none";
            document.getElementById("tabel13").style.display="none";
            document.getElementById("gancit").style.display="none";
            document.getElementById("tabel14").style.display="none";
            document.getElementById("pim").style.display="none";
            document.getElementById("tabel15").style.display="none";
            document.getElementById("setiabudi").style.display="none";
            document.getElementById("tabel16").style.display="none";
        }
        else if(document.getElementById("nama_mall").value=='PLAZA INDONESIA'){
            document.getElementById("all_mall").style.display="none";
            document.getElementById("tabel1").style.display="none";
            document.getElementById("gi").style.display="none";
            document.getElementById("tabel2").style.display="none";
            document.getElementById("pp").style.display="none";
            document.getElementById("tabel3").style.display="none";
            document.getElementById("pi").style.display="block";
            document.getElementById("tabel4").style.display="block";
            document.getElementById("kokas").style.display="none";
            document.getElementById("tabel5").style.display="none";
            document.getElementById("ps").style.display="none";
            document.getElementById("tabel6").style.display="none";
            document.getElementById("senci").style.display="none";
            document.getElementById("tabel7").style.display="none";
            document.getElementById("emporium").style.display="none";
            document.getElementById("tabel8").style.display="none";
            document.getElementById("mkg").style.display="none";
            document.getElementById("tabel9").style.display="none";
            document.getElementById("smb").style.display="none";
            document.getElementById("tabel10").style.display="none";
            document.getElementById("aeon").style.display="none";
            document.getElementById("tabel11").style.display="none";
            document.getElementById("lipkar").style.display="none";
            document.getElementById("tabel12").style.display="none";
            document.getElementById("sms").style.display="none";
            document.getElementById("tabel13").style.display="none";
            document.getElementById("gancit").style.display="none";
            document.getElementById("tabel14").style.display="none";
            document.getElementById("pim").style.display="none";
            document.getElementById("tabel15").style.display="none";
            document.getElementById("setiabudi").style.display="none";
            document.getElementById("tabel16").style.display="none";
        }
        else if(document.getElementById("nama_mall").value=='KOTA KASABLANKA'){
            document.getElementById("all_mall").style.display="none";
            document.getElementById("tabel1").style.display="none";
            document.getElementById("gi").style.display="none";
            document.getElementById("tabel2").style.display="none";
            document.getElementById("pp").style.display="none";
            document.getElementById("tabel3").style.display="none";
            document.getElementById("pi").style.display="none";
            document.getElementById("tabel4").style.display="none";
            document.getElementById("kokas").style.display="block";
            document.getElementById("tabel5").style.display="block";
            document.getElementById("ps").style.display="none";
            document.getElementById("tabel6").style.display="none";
            document.getElementById("senci").style.display="none";
            document.getElementById("tabel7").style.display="none";
            document.getElementById("emporium").style.display="none";
            document.getElementById("tabel8").style.display="none";
            document.getElementById("mkg").style.display="none";
            document.getElementById("tabel9").style.display="none";
            document.getElementById("smb").style.display="none";
            document.getElementById("tabel10").style.display="none";
            document.getElementById("aeon").style.display="none";
            document.getElementById("tabel11").style.display="none";
            document.getElementById("lipkar").style.display="none";
            document.getElementById("tabel12").style.display="none";
            document.getElementById("sms").style.display="none";
            document.getElementById("tabel13").style.display="none";
            document.getElementById("gancit").style.display="none";
            document.getElementById("tabel14").style.display="none";
            document.getElementById("pim").style.display="none";
            document.getElementById("tabel15").style.display="none";
            document.getElementById("setiabudi").style.display="none";
            document.getElementById("tabel16").style.display="none";
        }
        else if(document.getElementById("nama_mall").value=='PLAZA SENAYAN'){
            document.getElementById("all_mall").style.display="none";
            document.getElementById("tabel1").style.display="none";
            document.getElementById("gi").style.display="none";
            document.getElementById("tabel2").style.display="none";
            document.getElementById("pp").style.display="none";
            document.getElementById("tabel3").style.display="none";
            document.getElementById("pi").style.display="none";
            document.getElementById("tabel4").style.display="none";
            document.getElementById("kokas").style.display="none";
            document.getElementById("tabel5").style.display="none";
            document.getElementById("ps").style.display="block";
            document.getElementById("tabel6").style.display="block";
            document.getElementById("senci").style.display="none";
            document.getElementById("tabel7").style.display="none";
            document.getElementById("emporium").style.display="none";
            document.getElementById("tabel8").style.display="none";
            document.getElementById("mkg").style.display="none";
            document.getElementById("tabel9").style.display="none";
            document.getElementById("smb").style.display="none";
            document.getElementById("tabel10").style.display="none";
            document.getElementById("aeon").style.display="none";
            document.getElementById("tabel11").style.display="none";
            document.getElementById("lipkar").style.display="none";
            document.getElementById("tabel12").style.display="none";
            document.getElementById("sms").style.display="none";
            document.getElementById("tabel13").style.display="none";
            document.getElementById("gancit").style.display="none";
            document.getElementById("tabel14").style.display="none";
            document.getElementById("pim").style.display="none";
            document.getElementById("tabel15").style.display="none";
            document.getElementById("setiabudi").style.display="none";
            document.getElementById("tabel16").style.display="none";
        }
        else if(document.getElementById("nama_mall").value=='SENAYAN CITY'){
            document.getElementById("all_mall").style.display="none";
            document.getElementById("tabel1").style.display="none";
            document.getElementById("gi").style.display="none";
            document.getElementById("tabel2").style.display="none";
            document.getElementById("pp").style.display="none";
            document.getElementById("tabel3").style.display="none";
            document.getElementById("pi").style.display="none";
            document.getElementById("tabel4").style.display="none";
            document.getElementById("kokas").style.display="none";
            document.getElementById("tabel5").style.display="none";
            document.getElementById("ps").style.display="none";
            document.getElementById("tabel6").style.display="none";
            document.getElementById("senci").style.display="block";
            document.getElementById("tabel7").style.display="block";
            document.getElementById("emporium").style.display="none";
            document.getElementById("tabel8").style.display="none";
            document.getElementById("mkg").style.display="none";
            document.getElementById("tabel9").style.display="none";
            document.getElementById("smb").style.display="none";
            document.getElementById("tabel10").style.display="none";
            document.getElementById("aeon").style.display="none";
            document.getElementById("tabel11").style.display="none";
            document.getElementById("lipkar").style.display="none";
            document.getElementById("tabel12").style.display="none";
            document.getElementById("sms").style.display="none";
            document.getElementById("tabel13").style.display="none";
            document.getElementById("gancit").style.display="none";
            document.getElementById("tabel14").style.display="none";
            document.getElementById("pim").style.display="none";
            document.getElementById("tabel15").style.display="none";
            document.getElementById("setiabudi").style.display="none";
            document.getElementById("tabel16").style.display="none";
        }
        else if(document.getElementById("nama_mall").value=='EMPORIUM'){
            document.getElementById("all_mall").style.display="none";
            document.getElementById("tabel1").style.display="none";
            document.getElementById("gi").style.display="none";
            document.getElementById("tabel2").style.display="none";
            document.getElementById("pp").style.display="none";
            document.getElementById("tabel3").style.display="none";
            document.getElementById("pi").style.display="none";
            document.getElementById("tabel4").style.display="none";
            document.getElementById("kokas").style.display="none";
            document.getElementById("tabel5").style.display="none";
            document.getElementById("ps").style.display="none";
            document.getElementById("tabel6").style.display="none";
            document.getElementById("senci").style.display="none";
            document.getElementById("tabel7").style.display="none";
            document.getElementById("emporium").style.display="block";
            document.getElementById("tabel8").style.display="block";
            document.getElementById("mkg").style.display="none";
            document.getElementById("tabel9").style.display="none";
            document.getElementById("smb").style.display="none";
            document.getElementById("tabel10").style.display="none";
            document.getElementById("aeon").style.display="none";
            document.getElementById("tabel11").style.display="none";
            document.getElementById("lipkar").style.display="none";
            document.getElementById("tabel12").style.display="none";
            document.getElementById("sms").style.display="none";
            document.getElementById("tabel13").style.display="none";
            document.getElementById("gancit").style.display="none";
            document.getElementById("tabel14").style.display="none";
            document.getElementById("pim").style.display="none";
            document.getElementById("tabel15").style.display="none";
            document.getElementById("setiabudi").style.display="none";
            document.getElementById("tabel16").style.display="none";
        }



        else if(document.getElementById("nama_mall").value=='MKG LAPIAZZA'){
            document.getElementById("all_mall").style.display="none";
            document.getElementById("tabel1").style.display="none";
            document.getElementById("gi").style.display="none";
            document.getElementById("tabel2").style.display="none";
            document.getElementById("pp").style.display="none";
            document.getElementById("tabel3").style.display="none";
            document.getElementById("pi").style.display="none";
            document.getElementById("tabel4").style.display="none";
            document.getElementById("kokas").style.display="none";
            document.getElementById("tabel5").style.display="none";
            document.getElementById("ps").style.display="none";
            document.getElementById("tabel6").style.display="none";
            document.getElementById("senci").style.display="none";
            document.getElementById("tabel7").style.display="none";
            document.getElementById("emporium").style.display="none";
            document.getElementById("tabel8").style.display="none";
            document.getElementById("mkg").style.display="block";
            document.getElementById("tabel9").style.display="block";
            document.getElementById("smb").style.display="none";
            document.getElementById("tabel10").style.display="none";
            document.getElementById("aeon").style.display="none";
            document.getElementById("tabel11").style.display="none";
            document.getElementById("lipkar").style.display="none";
            document.getElementById("tabel12").style.display="none";
            document.getElementById("sms").style.display="none";
            document.getElementById("tabel13").style.display="none";
            document.getElementById("gancit").style.display="none";
            document.getElementById("tabel14").style.display="none";
            document.getElementById("pim").style.display="none";
            document.getElementById("tabel15").style.display="none";
            document.getElementById("setiabudi").style.display="none";
            document.getElementById("tabel16").style.display="none";
        }
        else if(document.getElementById("nama_mall").value=='SUMMARECON BEKASI'){
            document.getElementById("all_mall").style.display="none";
            document.getElementById("tabel1").style.display="none";
            document.getElementById("gi").style.display="none";
            document.getElementById("tabel2").style.display="none";
            document.getElementById("pp").style.display="none";
            document.getElementById("tabel3").style.display="none";
            document.getElementById("pi").style.display="none";
            document.getElementById("tabel4").style.display="none";
            document.getElementById("kokas").style.display="none";
            document.getElementById("tabel5").style.display="none";
            document.getElementById("ps").style.display="none";
            document.getElementById("tabel6").style.display="none";
            document.getElementById("senci").style.display="none";
            document.getElementById("tabel7").style.display="none";
            document.getElementById("emporium").style.display="none";
            document.getElementById("tabel8").style.display="none";
            document.getElementById("mkg").style.display="none";
            document.getElementById("tabel9").style.display="none";
            document.getElementById("smb").style.display="block";
            document.getElementById("tabel10").style.display="block";
            document.getElementById("aeon").style.display="none";
            document.getElementById("tabel11").style.display="none";
            document.getElementById("lipkar").style.display="none";
            document.getElementById("tabel12").style.display="none";
            document.getElementById("sms").style.display="none";
            document.getElementById("tabel13").style.display="none";
            document.getElementById("gancit").style.display="none";
            document.getElementById("tabel14").style.display="none";
            document.getElementById("pim").style.display="none";
            document.getElementById("tabel15").style.display="none";
            document.getElementById("setiabudi").style.display="none";
            document.getElementById("tabel16").style.display="none";
        }
        else if(document.getElementById("nama_mall").value=='AEON'){
            document.getElementById("all_mall").style.display="none";
            document.getElementById("tabel1").style.display="none";
            document.getElementById("gi").style.display="none";
            document.getElementById("tabel2").style.display="none";
            document.getElementById("pp").style.display="none";
            document.getElementById("tabel3").style.display="none";
            document.getElementById("pi").style.display="none";
            document.getElementById("tabel4").style.display="none";
            document.getElementById("kokas").style.display="none";
            document.getElementById("tabel5").style.display="none";
            document.getElementById("ps").style.display="none";
            document.getElementById("tabel6").style.display="none";
            document.getElementById("senci").style.display="none";
            document.getElementById("tabel7").style.display="none";
            document.getElementById("emporium").style.display="none";
            document.getElementById("tabel8").style.display="none";
            document.getElementById("mkg").style.display="none";
            document.getElementById("tabel9").style.display="none";
            document.getElementById("smb").style.display="none";
            document.getElementById("tabel10").style.display="none";
            document.getElementById("aeon").style.display="block";
            document.getElementById("tabel11").style.display="block";
            document.getElementById("lipkar").style.display="none";
            document.getElementById("tabel12").style.display="none";
            document.getElementById("sms").style.display="none";
            document.getElementById("tabel13").style.display="none";
            document.getElementById("gancit").style.display="none";
            document.getElementById("tabel14").style.display="none";
            document.getElementById("pim").style.display="none";
            document.getElementById("tabel15").style.display="none";
            document.getElementById("setiabudi").style.display="none";
            document.getElementById("tabel16").style.display="none";
        }
        else if(document.getElementById("nama_mall").value=='LIPPO MALL KARAWACI'){
            document.getElementById("all_mall").style.display="none";
            document.getElementById("tabel1").style.display="none";
            document.getElementById("gi").style.display="none";
            document.getElementById("tabel2").style.display="none";
            document.getElementById("pp").style.display="none";
            document.getElementById("tabel3").style.display="none";
            document.getElementById("pi").style.display="none";
            document.getElementById("tabel4").style.display="none";
            document.getElementById("kokas").style.display="none";
            document.getElementById("tabel5").style.display="none";
            document.getElementById("ps").style.display="none";
            document.getElementById("tabel6").style.display="none";
            document.getElementById("senci").style.display="none";
            document.getElementById("tabel7").style.display="none";
            document.getElementById("emporium").style.display="none";
            document.getElementById("tabel8").style.display="none";
            document.getElementById("mkg").style.display="none";
            document.getElementById("tabel9").style.display="none";
            document.getElementById("smb").style.display="none";
            document.getElementById("tabel10").style.display="none";
            document.getElementById("aeon").style.display="none";
            document.getElementById("tabel11").style.display="none";
            document.getElementById("lipkar").style.display="block";
            document.getElementById("tabel12").style.display="block";
            document.getElementById("sms").style.display="none";
            document.getElementById("tabel13").style.display="none";
            document.getElementById("gancit").style.display="none";
            document.getElementById("tabel14").style.display="none";
            document.getElementById("pim").style.display="none";
            document.getElementById("tabel15").style.display="none";
            document.getElementById("setiabudi").style.display="none";
            document.getElementById("tabel16").style.display="none";
        }
        else if(document.getElementById("nama_mall").value=='SUMMARECON SERPONG'){
            document.getElementById("all_mall").style.display="none";
            document.getElementById("tabel1").style.display="none";
            document.getElementById("gi").style.display="none";
            document.getElementById("tabel2").style.display="none";
            document.getElementById("pp").style.display="none";
            document.getElementById("tabel3").style.display="none";
            document.getElementById("pi").style.display="none";
            document.getElementById("tabel4").style.display="none";
            document.getElementById("kokas").style.display="none";
            document.getElementById("tabel5").style.display="none";
            document.getElementById("ps").style.display="none";
            document.getElementById("tabel6").style.display="none";
            document.getElementById("senci").style.display="none";
            document.getElementById("tabel7").style.display="none";
            document.getElementById("emporium").style.display="none";
            document.getElementById("tabel8").style.display="none";
            document.getElementById("mkg").style.display="none";
            document.getElementById("tabel9").style.display="none";
            document.getElementById("smb").style.display="none";
            document.getElementById("tabel10").style.display="none";
            document.getElementById("aeon").style.display="none";
            document.getElementById("tabel11").style.display="none";
            document.getElementById("lipkar").style.display="none";
            document.getElementById("tabel12").style.display="none";
            document.getElementById("sms").style.display="block";
            document.getElementById("tabel13").style.display="block";
            document.getElementById("gancit").style.display="none";
            document.getElementById("tabel14").style.display="none";
            document.getElementById("pim").style.display="none";
            document.getElementById("tabel15").style.display="none";
            document.getElementById("setiabudi").style.display="none";
            document.getElementById("tabel16").style.display="none";
        }
        else if(document.getElementById("nama_mall").value=='GANDARIA CITY'){
            document.getElementById("all_mall").style.display="none";
            document.getElementById("tabel1").style.display="none";
            document.getElementById("gi").style.display="none";
            document.getElementById("tabel2").style.display="none";
            document.getElementById("pp").style.display="none";
            document.getElementById("tabel3").style.display="none";
            document.getElementById("pi").style.display="none";
            document.getElementById("tabel4").style.display="none";
            document.getElementById("kokas").style.display="none";
            document.getElementById("tabel5").style.display="none";
            document.getElementById("ps").style.display="none";
            document.getElementById("tabel6").style.display="none";
            document.getElementById("senci").style.display="none";
            document.getElementById("tabel7").style.display="none";
            document.getElementById("emporium").style.display="none";
            document.getElementById("tabel8").style.display="none";
            document.getElementById("mkg").style.display="none";
            document.getElementById("tabel9").style.display="none";
            document.getElementById("smb").style.display="none";
            document.getElementById("tabel10").style.display="none";
            document.getElementById("aeon").style.display="none";
            document.getElementById("tabel11").style.display="none";
            document.getElementById("lipkar").style.display="none";
            document.getElementById("tabel12").style.display="none";
            document.getElementById("sms").style.display="none";
            document.getElementById("tabel13").style.display="none";
            document.getElementById("gancit").style.display="block";
            document.getElementById("tabel14").style.display="block";
            document.getElementById("pim").style.display="none";
            document.getElementById("tabel15").style.display="none";
            document.getElementById("setiabudi").style.display="none";
            document.getElementById("tabel16").style.display="none";
        }
        else if(document.getElementById("nama_mall").value=='PIM'){
            document.getElementById("all_mall").style.display="none";
            document.getElementById("tabel1").style.display="none";
            document.getElementById("gi").style.display="none";
            document.getElementById("tabel2").style.display="none";
            document.getElementById("pp").style.display="none";
            document.getElementById("tabel3").style.display="none";
            document.getElementById("pi").style.display="none";
            document.getElementById("tabel4").style.display="none";
            document.getElementById("kokas").style.display="none";
            document.getElementById("tabel5").style.display="none";
            document.getElementById("ps").style.display="none";
            document.getElementById("tabel6").style.display="none";
            document.getElementById("senci").style.display="none";
            document.getElementById("tabel7").style.display="none";
            document.getElementById("emporium").style.display="none";
            document.getElementById("tabel8").style.display="none";
            document.getElementById("mkg").style.display="none";
            document.getElementById("tabel9").style.display="none";
            document.getElementById("smb").style.display="none";
            document.getElementById("tabel10").style.display="none";
            document.getElementById("aeon").style.display="none";
            document.getElementById("tabel11").style.display="none";
            document.getElementById("lipkar").style.display="none";
            document.getElementById("tabel12").style.display="none";
            document.getElementById("sms").style.display="none";
            document.getElementById("tabel13").style.display="none";
            document.getElementById("gancit").style.display="none";
            document.getElementById("tabel14").style.display="none";
            document.getElementById("pim").style.display="block";
            document.getElementById("tabel15").style.display="block";
            document.getElementById("setiabudi").style.display="none";
            document.getElementById("tabel16").style.display="none";
        }
        else if(document.getElementById("nama_mall").value=='SETIABUDI ONE'){
            document.getElementById("all_mall").style.display="none";
            document.getElementById("tabel1").style.display="none";
            document.getElementById("gi").style.display="none";
            document.getElementById("tabel2").style.display="none";
            document.getElementById("pp").style.display="none";
            document.getElementById("tabel3").style.display="none";
            document.getElementById("pi").style.display="none";
            document.getElementById("tabel4").style.display="none";
            document.getElementById("kokas").style.display="none";
            document.getElementById("tabel5").style.display="none";
            document.getElementById("ps").style.display="none";
            document.getElementById("tabel6").style.display="none";
            document.getElementById("senci").style.display="none";
            document.getElementById("tabel7").style.display="none";
            document.getElementById("emporium").style.display="none";
            document.getElementById("tabel8").style.display="none";
            document.getElementById("mkg").style.display="none";
            document.getElementById("tabel9").style.display="none";
            document.getElementById("smb").style.display="none";
            document.getElementById("tabel10").style.display="none";
            document.getElementById("aeon").style.display="none";
            document.getElementById("tabel11").style.display="none";
            document.getElementById("lipkar").style.display="none";
            document.getElementById("tabel12").style.display="none";
            document.getElementById("sms").style.display="none";
            document.getElementById("tabel13").style.display="none";
            document.getElementById("gancit").style.display="none";
            document.getElementById("tabel14").style.display="none";
            document.getElementById("pim").style.display="none";
            document.getElementById("tabel15").style.display="none";
            document.getElementById("setiabudi").style.display="block";
            document.getElementById("tabel16").style.display="block";
        }
        else{
            document.getElementById("all_mall").style.display="none";
            document.getElementById("tabel1").style.display="none";
            document.getElementById("gi").style.display="none";
            document.getElementById("tabel2").style.display="none";
            document.getElementById("pp").style.display="none";
            document.getElementById("tabel3").style.display="none";
            document.getElementById("pi").style.display="none";
            document.getElementById("tabel4").style.display="none";
            document.getElementById("kokas").style.display="none";
            document.getElementById("tabel5").style.display="none";
            document.getElementById("ps").style.display="none";
            document.getElementById("tabel6").style.display="none";
            document.getElementById("senci").style.display="none";
            document.getElementById("tabel7").style.display="none";
            document.getElementById("emporium").style.display="none";
            document.getElementById("tabel8").style.display="none";
            document.getElementById("mkg").style.display="none";
            document.getElementById("tabel9").style.display="none";
            document.getElementById("smb").style.display="none";
            document.getElementById("tabel10").style.display="none";
            document.getElementById("aeon").style.display="none";
            document.getElementById("tabel11").style.display="none";
            document.getElementById("lipkar").style.display="none";
            document.getElementById("tabel12").style.display="none";
            document.getElementById("sms").style.display="none";
            document.getElementById("tabel13").style.display="none";
            document.getElementById("gancit").style.display="none";
            document.getElementById("tabel14").style.display="none";
            document.getElementById("pim").style.display="none";
            document.getElementById("tabel15").style.display="none";
            document.getElementById("setiabudi").style.display="none";
            document.getElementById("tabel16").style.display="none";
        }
    }
