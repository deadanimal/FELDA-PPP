@extends('layouts.guest')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

@section('innercontent')
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<style type="text/css">
    @import url('https://themes.googleusercontent.com/fonts/css?kit=fpjTOVmNbO4Lz34iLyptLUXza5VhXqVC6o75Eld_V98');.lst-kix_list_4-1>li{counter-increment:lst-ctn-kix_list_4-1}ol.lst-kix_list_3-1{list-style-type:none}ol.lst-kix_list_3-2{list-style-type:none}.lst-kix_list_3-1>li{counter-increment:lst-ctn-kix_list_3-1}ol.lst-kix_list_3-3{list-style-type:none}ol.lst-kix_list_3-4.start{counter-reset:lst-ctn-kix_list_3-4 0}ol.lst-kix_list_3-4{list-style-type:none}ol.lst-kix_list_3-0{list-style-type:none}.lst-kix_list_1-1>li{counter-increment:lst-ctn-kix_list_1-1}.lst-kix_list_3-0>li:before{content:"" counter(lst-ctn-kix_list_3-0,decimal) ". "}ol.lst-kix_list_3-1.start{counter-reset:lst-ctn-kix_list_3-1 0}.lst-kix_list_3-1>li:before{content:"" counter(lst-ctn-kix_list_3-1,lower-latin) ". "}.lst-kix_list_3-2>li:before{content:"" counter(lst-ctn-kix_list_3-2,lower-roman) ". "}ol.lst-kix_list_1-8.start{counter-reset:lst-ctn-kix_list_1-8 0}.lst-kix_list_4-0>li{counter-increment:lst-ctn-kix_list_4-0}.lst-kix_list_3-5>li:before{content:"" counter(lst-ctn-kix_list_3-5,lower-roman) ". "}.lst-kix_list_3-4>li:before{content:"" counter(lst-ctn-kix_list_3-4,lower-latin) ". "}ol.lst-kix_list_1-5.start{counter-reset:lst-ctn-kix_list_1-5 0}.lst-kix_list_3-3>li:before{content:"" counter(lst-ctn-kix_list_3-3,decimal) ". "}ol.lst-kix_list_3-5{list-style-type:none}ol.lst-kix_list_3-6{list-style-type:none}ol.lst-kix_list_3-7{list-style-type:none}ol.lst-kix_list_3-8{list-style-type:none}.lst-kix_list_3-8>li:before{content:"" counter(lst-ctn-kix_list_3-8,lower-roman) ". "}.lst-kix_list_2-0>li{counter-increment:lst-ctn-kix_list_2-0}.lst-kix_list_3-6>li:before{content:"" counter(lst-ctn-kix_list_3-6,decimal) ". "}.lst-kix_list_4-3>li{counter-increment:lst-ctn-kix_list_4-3}.lst-kix_list_3-7>li:before{content:"" counter(lst-ctn-kix_list_3-7,lower-latin) ". "}ol.lst-kix_list_4-5.start{counter-reset:lst-ctn-kix_list_4-5 0}.lst-kix_list_1-2>li{counter-increment:lst-ctn-kix_list_1-2}ol.lst-kix_list_3-7.start{counter-reset:lst-ctn-kix_list_3-7 0}ol.lst-kix_list_4-2.start{counter-reset:lst-ctn-kix_list_4-2 0}.lst-kix_list_3-2>li{counter-increment:lst-ctn-kix_list_3-2}.lst-kix_list_1-4>li{counter-increment:lst-ctn-kix_list_1-4}.lst-kix_list_4-4>li{counter-increment:lst-ctn-kix_list_4-4}ol.lst-kix_list_2-0{list-style-type:none}ol.lst-kix_list_1-6.start{counter-reset:lst-ctn-kix_list_1-6 0}.lst-kix_list_4-8>li:before{content:"" counter(lst-ctn-kix_list_4-8,lower-roman) ". "}.lst-kix_list_4-7>li:before{content:"" counter(lst-ctn-kix_list_4-7,lower-latin) ". "}ol.lst-kix_list_4-1.start{counter-reset:lst-ctn-kix_list_4-1 0}ol.lst-kix_list_4-8.start{counter-reset:lst-ctn-kix_list_4-8 0}ol.lst-kix_list_3-3.start{counter-reset:lst-ctn-kix_list_3-3 0}ol.lst-kix_list_1-0.start{counter-reset:lst-ctn-kix_list_1-0 0}.lst-kix_list_3-0>li{counter-increment:lst-ctn-kix_list_3-0}.lst-kix_list_3-3>li{counter-increment:lst-ctn-kix_list_3-3}ol.lst-kix_list_4-0.start{counter-reset:lst-ctn-kix_list_4-0 1}.lst-kix_list_3-6>li{counter-increment:lst-ctn-kix_list_3-6}ol.lst-kix_list_3-2.start{counter-reset:lst-ctn-kix_list_3-2 0}ol.lst-kix_list_4-7.start{counter-reset:lst-ctn-kix_list_4-7 0}ol.lst-kix_list_1-3{list-style-type:none}ol.lst-kix_list_1-4{list-style-type:none}.lst-kix_list_2-6>li:before{content:"\002022  "}.lst-kix_list_2-7>li:before{content:"\002022  "}.lst-kix_list_3-7>li{counter-increment:lst-ctn-kix_list_3-7}ol.lst-kix_list_1-5{list-style-type:none}ol.lst-kix_list_1-6{list-style-type:none}ol.lst-kix_list_1-0{list-style-type:none}.lst-kix_list_2-4>li:before{content:"\002022  "}.lst-kix_list_2-5>li:before{content:"\002022  "}.lst-kix_list_2-8>li:before{content:"\002022  "}ol.lst-kix_list_1-1{list-style-type:none}ol.lst-kix_list_1-2{list-style-type:none}ol.lst-kix_list_4-6.start{counter-reset:lst-ctn-kix_list_4-6 0}ol.lst-kix_list_3-0.start{counter-reset:lst-ctn-kix_list_3-0 1}ol.lst-kix_list_4-3.start{counter-reset:lst-ctn-kix_list_4-3 0}ol.lst-kix_list_1-7{list-style-type:none}.lst-kix_list_4-7>li{counter-increment:lst-ctn-kix_list_4-7}.lst-kix_list_1-7>li{counter-increment:lst-ctn-kix_list_1-7}ol.lst-kix_list_1-8{list-style-type:none}ol.lst-kix_list_3-8.start{counter-reset:lst-ctn-kix_list_3-8 0}.lst-kix_list_4-0>li:before{content:"" counter(lst-ctn-kix_list_4-0,decimal) ". "}.lst-kix_list_3-8>li{counter-increment:lst-ctn-kix_list_3-8}.lst-kix_list_4-1>li:before{content:"" counter(lst-ctn-kix_list_4-1,lower-latin) ". "}.lst-kix_list_4-6>li{counter-increment:lst-ctn-kix_list_4-6}ol.lst-kix_list_1-7.start{counter-reset:lst-ctn-kix_list_1-7 0}.lst-kix_list_4-4>li:before{content:"" counter(lst-ctn-kix_list_4-4,lower-latin) ". "}.lst-kix_list_1-5>li{counter-increment:lst-ctn-kix_list_1-5}.lst-kix_list_4-3>li:before{content:"" counter(lst-ctn-kix_list_4-3,decimal) ". "}.lst-kix_list_4-5>li:before{content:"" counter(lst-ctn-kix_list_4-5,lower-roman) ". "}.lst-kix_list_4-2>li:before{content:"" counter(lst-ctn-kix_list_4-2,lower-roman) ". "}.lst-kix_list_4-6>li:before{content:"" counter(lst-ctn-kix_list_4-6,decimal) ". "}.lst-kix_list_1-8>li{counter-increment:lst-ctn-kix_list_1-8}ol.lst-kix_list_1-4.start{counter-reset:lst-ctn-kix_list_1-4 0}.lst-kix_list_3-5>li{counter-increment:lst-ctn-kix_list_3-5}ol.lst-kix_list_1-1.start{counter-reset:lst-ctn-kix_list_1-1 0}ol.lst-kix_list_4-0{list-style-type:none}.lst-kix_list_3-4>li{counter-increment:lst-ctn-kix_list_3-4}ol.lst-kix_list_4-1{list-style-type:none}ol.lst-kix_list_4-4.start{counter-reset:lst-ctn-kix_list_4-4 0}ol.lst-kix_list_4-2{list-style-type:none}ol.lst-kix_list_4-3{list-style-type:none}ol.lst-kix_list_3-6.start{counter-reset:lst-ctn-kix_list_3-6 0}ol.lst-kix_list_1-3.start{counter-reset:lst-ctn-kix_list_1-3 0}ul.lst-kix_list_2-8{list-style-type:none}ol.lst-kix_list_1-2.start{counter-reset:lst-ctn-kix_list_1-2 0}ol.lst-kix_list_4-8{list-style-type:none}ul.lst-kix_list_2-2{list-style-type:none}.lst-kix_list_1-0>li:before{content:"" counter(lst-ctn-kix_list_1-0,lower-roman) ". "}ul.lst-kix_list_2-3{list-style-type:none}ul.lst-kix_list_2-1{list-style-type:none}ol.lst-kix_list_4-4{list-style-type:none}ul.lst-kix_list_2-6{list-style-type:none}ol.lst-kix_list_4-5{list-style-type:none}.lst-kix_list_1-1>li:before{content:"" counter(lst-ctn-kix_list_1-1,lower-latin) ". "}.lst-kix_list_1-2>li:before{content:"" counter(lst-ctn-kix_list_1-2,lower-roman) ". "}ol.lst-kix_list_2-0.start{counter-reset:lst-ctn-kix_list_2-0 1}ul.lst-kix_list_2-7{list-style-type:none}ol.lst-kix_list_4-6{list-style-type:none}ul.lst-kix_list_2-4{list-style-type:none}ol.lst-kix_list_4-7{list-style-type:none}ul.lst-kix_list_2-5{list-style-type:none}.lst-kix_list_1-3>li:before{content:"" counter(lst-ctn-kix_list_1-3,decimal) ". "}.lst-kix_list_1-4>li:before{content:"" counter(lst-ctn-kix_list_1-4,lower-latin) ". "}ol.lst-kix_list_3-5.start{counter-reset:lst-ctn-kix_list_3-5 0}.lst-kix_list_1-0>li{counter-increment:lst-ctn-kix_list_1-0}.lst-kix_list_4-8>li{counter-increment:lst-ctn-kix_list_4-8}.lst-kix_list_1-6>li{counter-increment:lst-ctn-kix_list_1-6}.lst-kix_list_1-7>li:before{content:"" counter(lst-ctn-kix_list_1-7,lower-latin) ". "}.lst-kix_list_1-3>li{counter-increment:lst-ctn-kix_list_1-3}.lst-kix_list_1-5>li:before{content:"" counter(lst-ctn-kix_list_1-5,lower-roman) ". "}.lst-kix_list_1-6>li:before{content:"" counter(lst-ctn-kix_list_1-6,decimal) ". "}.lst-kix_list_2-0>li:before{content:"" counter(lst-ctn-kix_list_2-0,decimal) ". "}.lst-kix_list_2-1>li:before{content:"\002022  "}.lst-kix_list_4-5>li{counter-increment:lst-ctn-kix_list_4-5}.lst-kix_list_1-8>li:before{content:"" counter(lst-ctn-kix_list_1-8,lower-roman) ". "}.lst-kix_list_2-2>li:before{content:"\002022  "}.lst-kix_list_2-3>li:before{content:"\002022  "}.lst-kix_list_4-2>li{counter-increment:lst-ctn-kix_list_4-2}ol{margin:0;padding:0}table td,table th{padding:0}.c27{border-right-style:solid;padding:0pt 5.8pt 0pt 5.8pt;border-bottom-color:#000000;border-top-width:1pt;border-right-width:1pt;border-left-color:#000000;vertical-align:bottom;border-right-color:#000000;border-left-width:1pt;border-top-style:solid;background-color:#e7e6e6;border-left-style:solid;border-bottom-width:1pt;width:37pt;border-top-color:#000000;border-bottom-style:solid}.c13{border-right-style:solid;padding:0pt 5.8pt 0pt 5.8pt;border-bottom-color:#000000;border-top-width:1pt;border-right-width:1pt;border-left-color:#000000;vertical-align:middle;border-right-color:#000000;border-left-width:1pt;border-top-style:solid;background-color:#e7e6e6;border-left-style:solid;border-bottom-width:1pt;width:272pt;border-top-color:#000000;border-bottom-style:solid}.c25{border-right-style:solid;padding:0pt 5.8pt 0pt 5.8pt;border-bottom-color:#000000;border-top-width:1pt;border-right-width:1pt;border-left-color:#000000;vertical-align:middle;border-right-color:#000000;border-left-width:1pt;border-top-style:solid;background-color:#e7e6e6;border-left-style:solid;border-bottom-width:1pt;width:37pt;border-top-color:#000000;border-bottom-style:solid}.c64{border-right-style:solid;padding:0pt 5.8pt 0pt 5.8pt;border-bottom-color:#000000;border-top-width:1pt;border-right-width:1pt;border-left-color:#000000;vertical-align:middle;border-right-color:#000000;border-left-width:1pt;border-top-style:solid;background-color:#e7e6e6;border-left-style:solid;border-bottom-width:1pt;width:154pt;border-top-color:#000000;border-bottom-style:solid}.c67{border-right-style:solid;padding:0pt 5.4pt 0pt 5.4pt;border-bottom-color:#000000;border-top-width:0pt;border-right-width:0pt;border-left-color:#000000;vertical-align:top;border-right-color:#000000;border-left-width:0pt;border-top-style:solid;border-left-style:solid;border-bottom-width:0pt;width:106.3pt;border-top-color:#000000;border-bottom-style:solid}.c59{border-right-style:solid;padding:0pt 5.8pt 0pt 5.8pt;border-bottom-color:#000000;border-top-width:0pt;border-right-width:1pt;border-left-color:#000000;vertical-align:middle;border-right-color:#000000;border-left-width:1pt;border-top-style:solid;border-left-style:solid;border-bottom-width:1pt;width:154pt;border-top-color:#000000;border-bottom-style:solid}.c51{border-right-style:solid;padding:0pt 5.8pt 0pt 5.8pt;border-bottom-color:#000000;border-top-width:0pt;border-right-width:1pt;border-left-color:#000000;vertical-align:bottom;border-right-color:#000000;border-left-width:1pt;border-top-style:solid;border-left-style:solid;border-bottom-width:0pt;width:272pt;border-top-color:#000000;border-bottom-style:solid}.c0{border-right-style:solid;padding:0pt 5.8pt 0pt 5.8pt;border-bottom-color:#000000;border-top-width:0pt;border-right-width:1pt;border-left-color:#000000;vertical-align:middle;border-right-color:#000000;border-left-width:1pt;border-top-style:solid;border-left-style:solid;border-bottom-width:0pt;width:154pt;border-top-color:#000000;border-bottom-style:solid}.c48{border-right-style:solid;padding:0pt 5.8pt 0pt 5.8pt;border-bottom-color:#000000;border-top-width:0pt;border-right-width:1pt;border-left-color:#000000;vertical-align:top;border-right-color:#000000;border-left-width:1pt;border-top-style:solid;border-left-style:solid;border-bottom-width:0pt;width:154pt;border-top-color:#000000;border-bottom-style:solid}.c34{border-right-style:solid;padding:0pt 5.4pt 0pt 5.4pt;border-bottom-color:#000000;border-top-width:0pt;border-right-width:0pt;border-left-color:#000000;vertical-align:top;border-right-color:#000000;border-left-width:0pt;border-top-style:solid;border-left-style:solid;border-bottom-width:0pt;width:295.1pt;border-top-color:#000000;border-bottom-style:solid}.c23{border-right-style:solid;padding:0pt 5.8pt 0pt 5.8pt;border-bottom-color:#000000;border-top-width:0pt;border-right-width:1pt;border-left-color:#000000;vertical-align:middle;border-right-color:#000000;border-left-width:1pt;border-top-style:solid;border-left-style:solid;border-bottom-width:0pt;width:37pt;border-top-color:#000000;border-bottom-style:solid}.c31{border-right-style:solid;padding:0pt 5.4pt 0pt 5.4pt;border-bottom-color:#000000;border-top-width:0pt;border-right-width:0pt;border-left-color:#000000;vertical-align:top;border-right-color:#000000;border-left-width:0pt;border-top-style:solid;border-left-style:solid;border-bottom-width:0pt;width:21.2pt;border-top-color:#000000;border-bottom-style:solid}.c21{border-right-style:solid;padding:0pt 5.8pt 0pt 5.8pt;border-bottom-color:#000000;border-top-width:0pt;border-right-width:1pt;border-left-color:#000000;vertical-align:bottom;border-right-color:#000000;border-left-width:1pt;border-top-style:solid;border-left-style:solid;border-bottom-width:0pt;width:37pt;border-top-color:#000000;border-bottom-style:solid}.c24{border-right-style:solid;padding:0pt 5.8pt 0pt 5.8pt;border-bottom-color:#000000;border-top-width:0pt;border-right-width:1pt;border-left-color:#000000;vertical-align:middle;border-right-color:#000000;border-left-width:1pt;border-top-style:solid;border-left-style:solid;border-bottom-width:0pt;width:272pt;border-top-color:#000000;border-bottom-style:solid}.c33{border-right-style:solid;padding:0pt 5.8pt 0pt 5.8pt;border-bottom-color:#000000;border-top-width:1pt;border-right-width:1pt;border-left-color:#000000;vertical-align:top;border-right-color:#000000;border-left-width:1pt;border-top-style:solid;border-left-style:solid;border-bottom-width:0pt;width:154pt;border-top-color:#000000;border-bottom-style:solid}.c47{border-right-style:solid;padding:0pt 5.8pt 0pt 5.8pt;border-bottom-color:#000000;border-top-width:0pt;border-right-width:0pt;border-left-color:#000000;vertical-align:middle;border-right-color:#000000;border-left-width:0pt;border-top-style:solid;border-left-style:solid;border-bottom-width:0pt;width:463pt;border-top-color:#000000;border-bottom-style:solid}.c71{border-right-style:solid;padding:0pt 5.8pt 0pt 5.8pt;border-bottom-color:#000000;border-top-width:0pt;border-right-width:1pt;border-left-color:#000000;vertical-align:middle;border-right-color:#000000;border-left-width:1pt;border-top-style:solid;border-left-style:solid;border-bottom-width:1pt;width:37pt;border-top-color:#000000;border-bottom-style:solid}.c55{border-right-style:solid;padding:0pt 5.8pt 0pt 5.8pt;border-bottom-color:#000000;border-top-width:1pt;border-right-width:1pt;border-left-color:#000000;vertical-align:bottom;border-right-color:#000000;border-left-width:1pt;border-top-style:solid;border-left-style:solid;border-bottom-width:0pt;width:37pt;border-top-color:#000000;border-bottom-style:solid}.c65{border-right-style:solid;padding:0pt 5.8pt 0pt 5.8pt;border-bottom-color:#000000;border-top-width:1pt;border-right-width:1pt;border-left-color:#000000;vertical-align:bottom;border-right-color:#000000;border-left-width:1pt;border-top-style:solid;border-left-style:solid;border-bottom-width:0pt;width:272pt;border-top-color:#000000;border-bottom-style:solid}.c36{border-right-style:solid;padding:0pt 5.8pt 0pt 5.8pt;border-bottom-color:#000000;border-top-width:0pt;border-right-width:1pt;border-left-color:#000000;vertical-align:middle;border-right-color:#000000;border-left-width:1pt;border-top-style:solid;border-left-style:solid;border-bottom-width:1pt;width:272pt;border-top-color:#000000;border-bottom-style:solid}.c30{margin-left:0pt;padding-top:3pt;list-style-position:inside;text-indent:45pt;padding-bottom:3pt;line-height:1.1500000000000001;orphans:2;widows:2;text-align:justify}.c10{-webkit-text-decoration-skip:none;color:#000000;font-weight:700;text-decoration:underline;vertical-align:baseline;text-decoration-skip-ink:none;font-size:12pt;font-style:normal}.c63{margin-left:180pt;padding-top:0pt;text-indent:36pt;padding-bottom:0pt;line-height:1.05;orphans:2;widows:2;text-align:justify}.c2{background-color:#ffff00;color:#000000;font-weight:400;text-decoration:none;vertical-align:baseline;font-size:12pt;font-style:normal}.c5{background-color:#ffff00;color:#000000;font-weight:700;text-decoration:none;vertical-align:baseline;font-size:12pt;font-style:normal}.c7{color:#000000;font-weight:400;text-decoration:none;vertical-align:baseline;font-size:12pt;font-style:normal}.c17{padding-top:0pt;padding-bottom:0pt;line-height:1.3;orphans:2;widows:2;text-align:justify;height:11pt}.c9{padding-top:0pt;padding-bottom:0pt;line-height:1.0;orphans:2;widows:2;text-align:left;height:11pt}.c16{padding-top:0pt;padding-bottom:8pt;line-height:1.1500000000000001;orphans:2;widows:2;text-align:justify;height:11pt}.c28{padding-top:0pt;padding-bottom:0pt;line-height:1.1500000000000001;orphans:2;widows:2;text-align:justify;height:11pt}.c45{color:#000000;font-weight:700;text-decoration:none;vertical-align:baseline;font-size:12pt;font-style:normal}.c37{color:#000000;font-weight:400;text-decoration:none;vertical-align:baseline;font-size:12pt;font-style:normal}.c15{padding-top:0pt;padding-bottom:0pt;line-height:1.5;orphans:2;widows:2;text-align:justify;height:11pt}.c12{padding-top:0pt;padding-bottom:8pt;line-height:1.0791666666666666;orphans:2;widows:2;text-align:left;height:11pt}.c29{color:#000000;font-weight:400;text-decoration:none;vertical-align:baseline;font-size:11pt;font-style:normal}.c43{color:#000000;font-weight:400;text-decoration:none;vertical-align:baseline;font-size:11pt}.c22{padding-top:3pt;padding-bottom:0pt;line-height:1.1500000000000001;orphans:2;widows:2;text-align:justify}.c49{padding-top:3pt;padding-bottom:3pt;line-height:1.1500000000000001;orphans:2;widows:2;text-align:justify}.c46{padding-top:0pt;padding-bottom:0pt;line-height:1.0;orphans:2;widows:2;text-align:left}.c70{padding-top:6pt;padding-bottom:8pt;line-height:1.1500000000000001;orphans:2;widows:2;text-align:justify}.c50{padding-top:3pt;padding-bottom:3pt;line-height:1.0791666666666666;orphans:2;widows:2;text-align:center}.c69{padding-top:0pt;padding-bottom:0pt;line-height:1.1500000000000001;orphans:2;widows:2;text-align:justify}.c53{padding-top:0pt;padding-bottom:8pt;line-height:1.0791666666666666;orphans:2;widows:2;text-align:center}.c66{padding-top:0pt;padding-bottom:8pt;line-height:1.1500000000000001;orphans:2;widows:2;text-align:center}.c39{padding-top:0pt;padding-bottom:0pt;line-height:1.1500000000000001;orphans:2;widows:2;text-align:left}.c3{padding-top:0pt;padding-bottom:3pt;line-height:1.0791666666666666;orphans:2;widows:2;text-align:left}.c8{padding-top:3pt;padding-bottom:3pt;line-height:1.0791666666666666;orphans:2;widows:2;text-align:left}.c32{padding-top:3pt;padding-bottom:3pt;line-height:1.0791666666666666;orphans:2;widows:2;text-align:justify}.c19{padding-top:0pt;padding-bottom:8pt;line-height:1.0791666666666666;orphans:2;widows:2;text-align:left}.c6{padding-top:0pt;padding-bottom:0pt;line-height:1.0;orphans:2;widows:2;text-align:center}.c61{padding-top:6pt;padding-bottom:0pt;line-height:1.1500000000000001;orphans:2;widows:2;text-align:justify}.c40{padding-top:0pt;padding-bottom:8pt;line-height:1.3;orphans:2;widows:2;text-align:justify}.c56{margin-left:28.1pt;border-spacing:0;border-collapse:collapse;margin-right:auto}.c14{border-spacing:0;border-collapse:collapse;margin-right:auto}.c41{padding-top:0pt;padding-bottom:0pt;line-height:1.15;text-align:left}.c20{font-size:12pt;font-weight:400}.c26{color:#000000;font-weight:700}.c18{background-color:#ffffff;max-width:451.3pt;padding:99.7pt 72pt 72pt 72pt}.c68{text-decoration:none;vertical-align:baseline;font-style:italic}.c58{font-size:12pt;font-weight:700}.c52{font-size:12pt;font-weight:400}.c74{margin-left:0pt;list-style-position:inside;text-indent:45pt}.c72{font-family:"Arial";font-weight:400}.c62{padding:0;margin:0}.c73{margin-left:180pt;text-indent:36pt}.c11{height:12.8pt}.c1{height:13.5pt}.c60{color:#000000}.c38{height:22.5pt}.c54{height:34pt}.c35{height:11pt}.c42{margin-right:-9pt}.c44{background-color:#ffff00}.c4{height:23.1pt}.c57{height:0pt}.title{padding-top:24pt;color:#000000;font-weight:700;font-size:36pt;padding-bottom:6pt;font-family:"Calibri";line-height:1.0791666666666666;page-break-after:avoid;orphans:2;widows:2;text-align:left}.subtitle{padding-top:18pt;color:#666666;font-size:24pt;padding-bottom:4pt;font-family:"Georgia";line-height:1.0791666666666666;page-break-after:avoid;font-style:italic;orphans:2;widows:2;text-align:left}li{color:#000000;font-size:11pt}p{margin:0;color:#000000;font-size:11pt;}
</style>
<div class="container-fluid">
    <div class="header">
        <h1 class="header-title">
            BORANG {{$borangJwpns->borangs->namaBorang}}
        </h1>
        <a href="/user/sub_borang/list"  class="frame9403-frame7445" style="margin-left:0px;">
            <div class="frame9403-frame7293">
              <span class="frame9403-text21"><span>Kembali</span></span>
            </div>
        </a>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body" style="width: 80%; margin:auto;">
                    <img src="/Image/header_surat.jpeg" style="width: -webkit-fill-available;">
                    <hr style="background-color: #000000;">
                    <table class="bdless" style="margin-right: 0px; margin-left:auto; border: 0px;">
                        <tr class="bdless">
                            <td class="bdless"><span class="c7">Ruj. Tuan</span></td>
                            <td class="bdless"><span>:</span></td>
                            <td class="bdless"><span class="c7"> - </span></td>
                        </tr>
                        <tr class="bdless">
                            <td class="bdless"><span class="c7">Ruj. Kami </span></td>
                            <td class="bdless"><span>:</span></td>
                            <td class="bdless"><span class="c7">FELDA.400-6/1/6 JLD 2()</span></td>
                        </tr>
                        <tr class="bdless">
                            <td class="bdless"><span class="c7">Tarikh </span></td>
                            <td class="bdless"><span>:</span></td>
                            <td class="bdless"><span class="c7"> 25 Julai 2022</span></td>
                        </tr>
                    </table>
                    <p class="c15"><span class="c7">{{$borangJwpns->user->nama}},</span></p>
                    <p class="c15"><span class="c37"></span></p>
                    <div class="c3"><span class="c7">@if($jawapan_alamat != null){!! nl2br(e($jawapan_alamat->jawapan))  !!}@endif</span></div>
                    <br>
                    <p class="c8"><span class="c7">Tuan/Puan,</span></p>
                    <p class="c8 c35"><span class="c7"></span></p>
                    <p class="c32">
                        <span class="c10">{{$surat->title}}</span>
                    </p>
                    <p class="c8 c35"><span class="c7"></span></p>
                    <div class="c32">
                        <x-markdown>{!!$surat_body!!}</x-markdown>
                    </div>
                    <p class="c8 c35 c42"><span class="c7"></span></p>
                    <p class="c19"><span class="c7">Sekian.</span></p>
                    <p class="c12"><span class="c7"></span></p>
                    <p class="c19"><span class="c7">Saya yang menjalankan amanah,</span></p>
                    <p class="c12"><span class="c7"></span></p>
                    <p class="c12"><span class="c7"></span></p>
                    <p class="c12"><span class="c7"></span></p>
                    <p class="c39"><span class="c45">(HASRIN ISMAIL)</span></p>
                    <p class="c39"><span class="c7">Pengarah</span></p>
                    <p class="c39"><span class="c7">Jabatan Pembangunan Pertanian &amp; Ternakan</span></p>
                    <p class="c39"><span class="c7">FELDA</span></p>
                    <p class="c9"><span class="c7"></span></p>
                    <p class="c19">
                        <span class="c20">s.k&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        <span class="c2">Pengarah Wilayah</span>
                    </p>
                    <p class="c19">
                        <span class="c20 c44">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FELDA Wilayah Mempaga</span>
                    </p>
                    <p class="c12"><span class="c7"></span></p>
                    <p class="c12"><span class="c52 c60 c68"></span></p>
                    <p class="c17"><span class="c37"></span></p>
                    <p class="c35 c40"><span class="c7"></span></p>
                    <div>
                        <p class="c6 c35"><span class="c29"></span></p>
                        <p class="c35 c66"><span class="c43"></span></p>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h2 style="text-transform: uppercase">Tindakan</h2>
                </div>
                <div class="card-body">
                    <table class="table-borderless bdless">
                        <tr class="bdless">
                            <td class="bdless"><button class="btn btn-success btn-lg" data-toggle="modal" data-target="#exampleModalTerima">Terima</button></td>
                            <td class="bdless"><button class="btn btn-danger btn-lg" data-toggle="modal" data-target="#exampleModalMenolak" style="margin-left:7%;">Menolak</button></td>    
                        </tr>
                    </table>
                    
                    {{-- modal Terima --}}
                    <div class="modal fade" id="exampleModalTerima" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tindakan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="/user/sub_borang/update" method="post">
                                @csrf
                                @method('put')
                                <div class="modal-body">
                                    @foreach ($acceptance as $accept)
                                        @if ($accept->types == "Terima")
                                            <div class="arial">{!!nl2br(e($accept->name))!!}</div>
                                        @endif
                                    @endforeach
                                    <input type="hidden" value="Terima" name="tindakan">
                                    <input type="hidden" value="{{$borangJwpns->id}}" name="jawapan_id">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">TIDAK</button>      
                                    <button type="submit" class="btn btn-primary">YA</button>
                                </div>
                            </form>
                          </div>
                      </div>
                    </div>

                    {{-- modal Menolak --}}
                    <div class="modal fade" id="exampleModalMenolak" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tindakan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="/user/sub_borang/update" method="post">
                                @csrf
                                @method('put')
                                <div class="modal-body">
                                    @foreach ($acceptance as $accept)
                                        @if ($accept->types == "Terima")
                                            <div class="arial">{!!nl2br(e($accept->name))!!}</div>
                                        @endif
                                    @endforeach>
                                    <input type="hidden" value="Menolak" name="tindakan">
                                    <input type="hidden" value="{{$borangJwpns->id}}" name="jawapan_id">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">TIDAK</button>      
                                    <button type="submit" class="btn btn-danger">YA</button>
                                </div>
                            </form>
                          </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    table, th, td, tr {
        border: 1px solid black;
    }

    .bdless{
        border: 0px;
    }
    .page_break { page-break-before: always; }

    .frame9403-frame7445 {
    width: 125px;
    height: 44px;
    display: flex;
    max-width: 157px;
    box-shadow: 0px 2px 3px 0px rgba(0, 0, 0, 0.25) ;
    box-sizing: border-box;
    align-items: center;
    padding-top: 0px;
    border-color: transparent;
    padding-left: 20px;
    border-radius: 8.598855018615723px;
    padding-right: 20px;
    flex-direction: column;
    padding-bottom: 0px;
    justify-content: center;
    background-color: #A2335D;
    margin-left:auto;
    margin-right: 0px;
    cursor: pointer;
    text-decoration: none;
  }
  .frame9403-frame7445:hover{
    text-decoration: none;

  }
  .frame9403-frame7293 {
    display: flex;
    position: relative;
    box-sizing: border-box;
    align-items: center;
    border-color: transparent;
    margin-right: 0;
    border-radius: 0px 0px 0px 0px;
    margin-bottom: 0;
    text-decoration: none;
  }
  .frame9403-text21 {
    color: #FFFFFF;
    width: auto;
    height: auto;
    font-size: 16px;
    align-self: auto;
    text-align: left;
    font-family: 'Arial', sans-serif;
    font-weight: 600;
    line-height: 34.39542007446289px;
    font-stretch: normal;
    margin-right: 2px;
    margin-bottom: 0;
    text-decoration: none;
  }
  .frame9403-group7527 {
    width: 24px;
    height: 24px;
    position: relative;
    box-sizing: border-box;
    border-color: transparent;
    margin-right: 0;
    margin-bottom: 0;
  } 
  .arial{
    font-family: 'Arial', sans-serif;
    text-transform: uppercase;
  }
</style>
@endsection