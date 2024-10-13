<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Autofix Garage</title>
	<link rel="icon" type="image/png" href="<?= base_url('assets/images/autofixicon_2.png') ?>">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Atkinson+Hyperlegible:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
	<style>
		* {
			box-sizing: border-box;
			-webkit-box-sizing: border-box;
			margin: 0;
			padding: 0;
		}

		ul {
			list-style: none;
		}

		a {
			text-decoration: none;
		}

		body {
			line-height: normal;
			overflow-x: hidden;
		}

		:root {
			--black: #000;
			--white: #fff;
		}


		/* TEXT */
		.tl {
			text-align: left;
		}

		.tr {
			text-align: right;
		}

		.tc {
			text-align: center;
		}

		.tj {
			text-align: justify;
		}

		.ttu {
			text-transform: uppercase;
		}

		.ttc {
			text-transform: capitalize;
		}


		/* HIDE */
		.hide {
			display: none;
		}

		.hideinpc {
			display: none;
		}

		.hideinmobile {}


		/* FLOAT */
		.fl {
			float: left;
		}

		.fr {
			float: right;
		}

		.fn {
			float: none;
		}



		/* WIDTH */
		.w100 {
			width: 100%;
		}

		.w90 {
			width: 90%;
		}

		.w80 {
			width: 80%;
		}

		.w70 {
			width: 70%;
		}

		.w60 {
			width: 60%;
		}

		.w55 {
			width: 55%;
		}

		.w50 {
			width: 50%;
		}

		.w45 {
			width: 45%;
		}

		.w40 {
			width: 40%;
		}

		.w35 {
			width: 35%;
		}

		.w30 {
			width: 30%;
		}

		.w25 {
			width: 25%;
		}

		.w20 {
			width: 20%;
		}

		.w15 {
			width: 15%;
		}

		.w10 {
			width: 10%;
		}

		.w5 {
			width: 5%;
		}

		.w0 {
			width: 0;
		}

		.wauto {
			width: auto;
		}




		/* HEIGHT */
		.hauto {
			height: auto;
		}

		.h0 {
			height: 0;
		}

		.h100 {
			height: 100%;
		}




		/* MAX WIDTH  */
		.max-w100 {
			max-width: 100%;
		}




		/* OVERFLOW */
		.ofh {
			overflow: hidden;
		}

		.ofxh {
			overflow-x: hidden;
		}

		.ofyh {
			overflow-y: hidden;
		}

		.ofxauto {
			overflow-y: auto;
		}

		.ofyauto {
			overflow-y: auto;
		}




		/* MARGINS */
		.mauto {
			margin: auto;
		}

		.mlauto {
			margin-left: auto;
		}

		.mrauto {
			margin-right: auto;
		}

		.mtauto {
			margin-top: auto;
		}

		.mbauto {
			margin-bottom: auto;
		}



		/* FONT SIZE */
		.fs10 {
			font-size: 10px;
		}

		.fs11 {
			font-size: 11px;
		}

		.fs12 {
			font-size: 12px;
		}

		.fs13 {
			font-size: 13px;
		}

		.fs14 {
			font-size: 14px;
		}

		.fs15 {
			font-size: 15px;
		}

		.fs16 {
			font-size: 16px;
		}

		.fs17 {
			font-size: 17px;
		}

		.fs18 {
			font-size: 18px;
		}

		.fs19 {
			font-size: 19px;
		}

		.fs20 {
			font-size: 20px;
		}

		.fs21 {
			font-size: 21px;
		}

		.fs24 {
			font-size: 24px;
		}

		.fs30 {
			font-size: 30px;
		}

		.fs36 {
			font-size: 36px;
		}

		.fs42 {
			font-size: 42px;
		}

		.fs48 {
			font-size: 48px;
		}

		.fs60 {
			font-size: 60px;
		}

		.fs72 {
			font-size: 72px;
		}

		.fs90 {
			font-size: 90px;
		}

		.fs120 {
			font-size: 120px;
		}



		/* FONT WEIGHT */
		.fwbold {
			font-weight: bold;
		}

		.fwnormal {
			font-weight: normal;
		}

		.fw300 {
			font-weight: 300;
		}

		.fw400 {
			font-weight: 400;
		}

		.fw500 {
			font-weight: 500;
		}

		.fw600 {
			font-weight: 600;
		}

		.fw700 {
			font-weight: 700;
		}

		.fw800 {
			font-weight: 800;
		}

		.fw900 {
			font-weight: 900;
		}





		/* POSITIONS */
		.relative {
			position: relative;
		}

		.absolute {
			position: absolute;
		}

		.fixed {
			position: fixed;
		}

		.static {
			position: static;
		}





		/* Z INDEXES */
		.zim2 {
			z-index: -2;
		}

		.zim1 {
			z-index: -1;
		}

		.zi1 {
			z-index: 1;
		}

		.zi2 {
			z-index: 2;
		}

		.zi3 {
			z-index: 3;
		}

		.zi4 {
			z-index: 4;
		}

		.zi5 {
			z-index: 5;
		}

		.zi5 {
			z-index: 5;
		}

		.zi6 {
			z-index: 6;
		}

		.zi7 {
			z-index: 7;
		}

		.zi8 {
			z-index: 8;
		}

		.zi9 {
			z-index: 9;
		}

		.zi10 {
			z-index: 10;
		}

		.zi99 {
			z-index: 99;
		}

		.zi999 {
			z-index: 999;
		}




		/* DISPLAY */
		.dnone {
			display: none;
		}

		.dtable {
			display: table;
		}

		.dblock {
			display: block;
		}

		.dflex {
			display: flex;
		}




		/* FLEX */
		.flex {
			display: flex;
		}

		.flexww {
			flex-wrap: wrap;
		}

		.flexwnw {
			flex-wrap: nowrap;
		}

		.flexdr {
			flex-direction: row;
		}

		.flexdrr {
			flex-direction: row-reverse;
		}

		.flexdc {
			flex-direction: column;
		}

		.flexdcr {
			flex-direction: column-reverse;
		}

		.aic {
			align-items: center;
		}

		.aifs {
			align-items: flex-start;
		}

		.aife {
			align-items: flex-end;
		}

		.jcc {
			justify-content: center;
		}

		.jcsb {
			justify-content: space-between;
		}

		.jcfs {
			justify-content: flex-start;
		}

		.jcfe {
			justify-content: flex-end;
		}



		/* FLEX EXTENDED */
		.flex-sb {
			display: flex;
			flex-wrap: wrap;
			justify-content: space-between;
		}

		.flex-sb-aic {
			display: flex;
			flex-wrap: wrap;
			justify-content: space-between;
			align-items: center;
		}

		.flex-sb-rv {
			display: flex;
			flex-wrap: wrap;
			justify-content: space-between;
			flex-direction: row-reverse;
		}

		.flex-center-all {
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
			align-items: center;
		}

		.flex-center-col {
			display: flex;
			flex-wrap: wrap;
			align-items: center;
			flex-direction: column;
		}



		/* IMAGES */
		.img-default {
			float: left;
			width: 90%;
			height: auto;
			border-radius: 10%;
			box-shadow: 10px 10px 15px black;
		}

		.fit {
			object-fit: cover;
			object-position: center;
		}

		.fitincenter {
			float: none;
			display: table;
			margin-left: auto;
			margin-right: auto;
		}



		/* BORDER RADIUS */
		.bdrfull {
			border-radius: 50%;
			-webkit-border-radius: 50%;
		}

		.bdr2 {
			border-radius: 2px;
			-webkit-border-radius: 2px;
		}

		.bdr3 {
			border-radius: 3px;
			-webkit-border-radius: 3px;
		}

		.bdr4 {
			border-radius: 4px;
			-webkit-border-radius: 4px;
		}

		.bdr5 {
			border-radius: 5px;
			-webkit-border-radius: 5px;
		}

		.bdr30 {
			border-radius: 30px;
			-webkit-border-radius: 30px;
		}

		.bdr50 {
			border-radius: 50px;
			-webkit-border-radius: 50px;
		}

		.bdr70 {
			border-radius: 70px;
			-webkit-border-radius: 70px;
		}




		/* MARGIN AND PADDINGS */
		.mb0 {
			margin-bottom: 0;
		}

		.mb5 {
			margin-bottom: 5px;
		}

		.mb10 {
			margin-bottom: 10px;
		}

		.mb15 {
			margin-bottom: 15px;
		}

		.mb20 {
			margin-bottom: 20px;
		}

		.mb25 {
			margin-bottom: 25px;
		}

		.mb30 {
			margin-bottom: 30px;
		}

		.mb40 {
			margin-bottom: 40px;
		}

		.mb50 {
			margin-bottom: 50px;
		}


		.pb0 {
			padding-bottom: 0px;
		}

		.pb5 {
			padding-bottom: 5px;
		}

		.pb10 {
			padding-bottom: 10px;
		}

		.pb15 {
			padding-bottom: 15px;
		}

		.pb20 {
			padding-bottom: 20px;
		}

		.pb25 {
			padding-bottom: 25px;
		}

		.pb30 {
			padding-bottom: 30px;
		}

		.pb40 {
			padding-bottom: 40px;
		}

		.pb50 {
			padding-bottom: 50px;
		}

		.pb60 {
			padding-bottom: 60px;
		}

		.pb70 {
			padding-bottom: 70px;
		}

		.pb80 {
			padding-bottom: 80px;
		}

		.pb90 {
			padding-bottom: 90px;
		}

		.pb100 {
			padding-bottom: 100px;
		}

		.pb120 {
			padding-bottom: 120px;
		}


		.pt0 {
			padding-top: 0px;
		}

		.pt5 {
			padding-top: 5px;
		}

		.pt10 {
			padding-top: 10px;
		}

		.pt15 {
			padding-top: 15px;
		}

		.pt20 {
			padding-top: 20px;
		}

		.pt25 {
			padding-top: 25px;
		}

		.pt30 {
			padding-top: 30px;
		}

		.pt40 {
			padding-top: 40px;
		}

		.pt50 {
			padding-top: 50px;
		}

		.pt60 {
			padding-top: 60px;
		}

		.pt70 {
			padding-top: 70px;
		}

		.pt80 {
			padding-top: 80px;
		}

		.pt90 {
			padding-top: 90px;
		}

		.pt100 {
			padding-top: 100px;
		}

		.pt120 {
			padding-top: 120px;
		}


		.pl0 {
			padding-left: 0;
		}

		.pl5 {
			padding-left: 5px;
		}

		.pl10 {
			padding-left: 10px;
		}

		.pl15 {
			padding-left: 15px;
		}

		.pl20 {
			padding-left: 20px;
		}

		.pl25 {
			padding-left: 25px;
		}

		.pl30 {
			padding-left: 30px;
		}

		.pl40 {
			padding-left: 40px;
		}

		.pl50 {
			padding-left: 50px;
		}

		.pl60 {
			padding-left: 60px;
		}

		.pl70 {
			padding-left: 70px;
		}

		.pl80 {
			padding-left: 80px;
		}

		.pl90 {
			padding-left: 90px;
		}

		.pl100 {
			padding-left: 100px;
		}

		.pl120 {
			padding-left: 120px;
		}


		.pr0 {
			padding-right: 0px;
		}

		.pr5 {
			padding-right: 5px;
		}

		.pr10 {
			padding-right: 10px;
		}

		.pr15 {
			padding-right: 15px;
		}

		.pr20 {
			padding-right: 20px;
		}

		.pr25 {
			padding-right: 25px;
		}

		.pr30 {
			padding-right: 30px;
		}

		.pr40 {
			padding-right: 40px;
		}

		.pr50 {
			padding-right: 50px;
		}

		.pr60 {
			padding-right: 60px;
		}

		.pr70 {
			padding-right: 70px;
		}

		.pr80 {
			padding-right: 80px;
		}

		.pr90 {
			padding-right: 90px;
		}

		.pr100 {
			padding-right: 100px;
		}

		.pr120 {
			padding-right: 120px;
		}


		.ptb0 {
			padding-top: 0;
			padding-bottom: 0;
		}

		.ptb5 {
			padding-top: 5px;
			padding-bottom: 5px;
		}

		.ptb10 {
			padding-top: 10px;
			padding-bottom: 10px;
		}

		.ptb15 {
			padding-top: 15px;
			padding-bottom: 15px;
		}

		.ptb20 {
			padding-top: 20px;
			padding-bottom: 20px;
		}

		.ptb25 {
			padding-top: 25px;
			padding-bottom: 25px;
		}

		.ptb30 {
			padding-top: 30px;
			padding-bottom: 30px;
		}

		.ptb40 {
			padding-top: 40px;
			padding-bottom: 40px;
		}

		.ptb50 {
			padding-top: 50px;
			padding-bottom: 50px;
		}

		.ptb60 {
			padding-top: 60px;
			padding-bottom: 60px;
		}

		.ptb70 {
			padding-top: 70px;
			padding-bottom: 70px;
		}

		.ptb80 {
			padding-top: 80px;
			padding-bottom: 80px;
		}

		.ptb90 {
			padding-top: 90px;
			padding-bottom: 90px;
		}

		.ptb100 {
			padding-top: 100px;
			padding-bottom: 100px;
		}

		.ptb120 {
			padding-top: 120px;
			padding-bottom: 120px;
		}




		/* TRANSITIONS */
		.ts0 {
			transition: 0s;
			-webkit-transition: 0s;
		}

		.ts03 {
			transition: 0.3s;
			-webkit-transition: 0.3s;
		}

		.ts05 {
			transition: 0.5s;
			-webkit-transition: 0.5s;
		}

		.ts09 {
			transition: 0.9s;
			-webkit-transition: 0.9s;
		}





		/* FOR TABLETS (T) */
		@media(max-width:1200px) {
			.hideinmobile {
				display: none !important;
			}

			.hideinpc {
				display: block !important;
			}



			.wauto-t {
				width: auto !important;
			}

			.w0-t {
				width: 0 !important;
			}

			.w5-t {
				width: 5% !important;
			}

			.w10-t {
				width: 10% !important;
			}

			.w15-t {
				width: 15% !important;
			}

			.w20-t {
				width: 20% !important;
			}

			.w25-t {
				width: 25% !important;
			}

			.w30-t {
				width: 30% !important;
			}

			.w35-t {
				width: 35% !important;
			}

			.w40-t {
				width: 40% !important;
			}

			.w45-t {
				width: 45% !important;
			}

			.w50-t {
				width: 50% !important;
			}

			.w55-t {
				width: 55% !important;
			}

			.w60-t {
				width: 60% !important;
			}

			.w70-t {
				width: 70% !important;
			}

			.w80-t {
				width: 80% !important;
			}

			.w90-t {
				width: 90% !important;
			}

			.w100-t {
				width: 100% !important;
			}




			.fs10-t {
				font-size: 10px !important;
			}

			.fs11-t {
				font-size: 11px !important;
			}

			.fs12-t {
				font-size: 12px !important;
			}

			.fs13-t {
				font-size: 13px !important;
			}

			.fs14-t {
				font-size: 14px !important;
			}

			.fs15-t {
				font-size: 15px !important;
			}

			.fs16-t {
				font-size: 16px !important;
			}

			.fs17-t {
				font-size: 17px !important;
			}

			.fs18-t {
				font-size: 18px !important;
			}

			.fs19-t {
				font-size: 19px !important;
			}

			.fs20-t {
				font-size: 20px !important;
			}

			.fs21-t {
				font-size: 21px !important;
			}

			.fs24-t {
				font-size: 24px !important;
			}

			.fs30-t {
				font-size: 30px !important;
			}

			.fs36-t {
				font-size: 36px !important;
			}

			.fs42-t {
				font-size: 42px !important;
			}

			.fs48-t {
				font-size: 48px !important;
			}

			.fs60-t {
				font-size: 60px !important;
			}

			.fs72-t {
				font-size: 72px !important;
			}

			.fs90-t {
				font-size: 90px !important;
			}

			.fs120-t {
				font-size: 120px !important;
			}



			.flex-t {
				display: flex !important;
			}

			.flexww-t {
				flex-wrap: wrap !important;
			}

			.flexwnw-t {
				flex-wrap: nowrap !important;
			}

			.flexdr-t {
				flex-direction: row !important;
			}

			.flexdrr-t {
				flex-direction: row-reverse !important;
			}

			.flexdc-t {
				flex-direction: column !important;
			}

			.flexdcr-t {
				flex-direction: column-reverse !important;
			}

			.aic-t {
				align-items: center !important;
			}

			.aifs-t {
				align-items: flex-start !important;
			}

			.aife-t {
				align-items: flex-end !important;
			}

			.jcc-t {
				justify-content: center !important;
			}

			.jcsb-t {
				justify-content: space-between !important;
			}

			.jcfs-t {
				justify-content: flex-start !important;
			}

			.jcfe-t {
				justify-content: flex-end !important;
			}



			.dnone-t {
				display: none !important;
			}

			.dtable-t {
				display: table !important;
			}

			.dblock-t {
				display: block !important;
			}

			.dflex-t {
				display: flex !important;
			}



			.mb0-t {
				margin-bottom: 0 !important;
			}

			.mb5-t {
				margin-bottom: 5px !important;
			}

			.mb10-t {
				margin-bottom: 10px !important;
			}

			.mb15-t {
				margin-bottom: 15px !important;
			}

			.mb20-t {
				margin-bottom: 20px !important;
			}

			.mb25-t {
				margin-bottom: 25px !important;
			}

			.mb30-t {
				margin-bottom: 30px !important;
			}

			.mb40-t {
				margin-bottom: 40px !important;
			}

			.mb50-t {
				margin-bottom: 50px !important;
			}

			.pb0-t {
				padding-bottom: 0px !important;
			}

			.pb5-t {
				padding-bottom: 5px !important;
			}

			.pb10-t {
				padding-bottom: 10px !important;
			}

			.pb15-t {
				padding-bottom: 15px !important;
			}

			.pb20-t {
				padding-bottom: 20px !important;
			}

			.pb25-t {
				padding-bottom: 25px !important;
			}

			.pb30-t {
				padding-bottom: 30px !important;
			}

			.pb40-t {
				padding-bottom: 40px !important;
			}

			.pb50-t {
				padding-bottom: 50px !important;
			}

			.pb60-t {
				padding-bottom: 60px !important;
			}

			.pb70-t {
				padding-bottom: 70px !important;
			}

			.pb80-t {
				padding-bottom: 80px !important;
			}

			.pb90-t {
				padding-bottom: 90px !important;
			}

			.pb100-t {
				padding-bottom: 100px !important;
			}

			.pb120-t {
				padding-bottom: 120px !important;
			}

			.pt0-t {
				padding-top: 0px !important;
			}

			.pt5-t {
				padding-top: 5px !important;
			}

			.pt10-t {
				padding-top: 10px !important;
			}

			.pt15-t {
				padding-top: 15px !important;
			}

			.pt20-t {
				padding-top: 20px !important;
			}

			.pt25-t {
				padding-top: 25px !important;
			}

			.pt30-t {
				padding-top: 30px !important;
			}

			.pt40-t {
				padding-top: 40px !important;
			}

			.pt50-t {
				padding-top: 50px !important;
			}

			.pt60-t {
				padding-top: 60px !important;
			}

			.pt70-t {
				padding-top: 70px !important;
			}

			.pt80-t {
				padding-top: 80px !important;
			}

			.pt90-t {
				padding-top: 90px !important;
			}

			.pt100-t {
				padding-top: 100px !important;
			}

			.pt120-t {
				padding-top: 120px !important;
			}

			.pl0-t {
				padding-left: 0 !important;
			}

			.pl5-t {
				padding-left: 5px !important;
			}

			.pl10-t {
				padding-left: 10px !important;
			}

			.pl15-t {
				padding-left: 15px !important;
			}

			.pl20-t {
				padding-left: 20px !important;
			}

			.pl25-t {
				padding-left: 25px !important;
			}

			.pl30-t {
				padding-left: 30px !important;
			}

			.pl40-t {
				padding-left: 40px !important;
			}

			.pl50-t {
				padding-left: 50px !important;
			}

			.pl60-t {
				padding-left: 60px !important;
			}

			.pl70-t {
				padding-left: 70px !important;
			}

			.pl80-t {
				padding-left: 80px !important;
			}

			.pl90-t {
				padding-left: 90px !important;
			}

			.pl100-t {
				padding-left: 100px !important;
			}

			.pl120-t {
				padding-left: 120px !important;
			}

			.pr0-t {
				padding-right: 0px !important;
			}

			.pr5-t {
				padding-right: 5px !important;
			}

			.pr10-t {
				padding-right: 10px !important;
			}

			.pr15-t {
				padding-right: 15px !important;
			}

			.pr20-t {
				padding-right: 20px !important;
			}

			.pr25-t {
				padding-right: 25px !important;
			}

			.pr30-t {
				padding-right: 30px !important;
			}

			.pr40-t {
				padding-right: 40px !important;
			}

			.pr50-t {
				padding-right: 50px !important;
			}

			.pr60-t {
				padding-right: 60px !important;
			}

			.pr70-t {
				padding-right: 70px !important;
			}

			.pr80-t {
				padding-right: 80px !important;
			}

			.pr90-t {
				padding-right: 90px !important;
			}

			.pr100-t {
				padding-right: 100px !important;
			}

			.pr120-t {
				padding-right: 120px !important;
			}

			.ptb0-t {
				padding-top: 0 !important;
				padding-bottom: 0 !important;
			}

			.ptb5-t {
				padding-top: 5px !important;
				padding-bottom: 5px !important;
			}

			.ptb10-t {
				padding-top: 10px !important;
				padding-bottom: 10px !important;
			}

			.ptb15-t {
				padding-top: 15px !important;
				padding-bottom: 15px !important;
			}

			.ptb20-t {
				padding-top: 20px !important;
				padding-bottom: 20px !important;
			}

			.ptb25-t {
				padding-top: 25px !important;
				padding-bottom: 25px !important;
			}

			.ptb30-t {
				padding-top: 30px !important;
				padding-bottom: 30px !important;
			}

			.ptb40-t {
				padding-top: 40px !important;
				padding-bottom: 40px !important;
			}

			.ptb50-t {
				padding-top: 50px !important;
				padding-bottom: 50px !important;
			}

			.ptb60-t {
				padding-top: 60px !important;
				padding-bottom: 60px !important;
			}

			.ptb70-t {
				padding-top: 70px !important;
				padding-bottom: 70px !important;
			}

			.ptb80-t {
				padding-top: 80px !important;
				padding-bottom: 80px !important;
			}

			.ptb90-t {
				padding-top: 90px !important;
				padding-bottom: 90px !important;
			}

			.ptb100-t {
				padding-top: 100px !important;
				padding-bottom: 100px !important;
			}

			.ptb120-t {
				padding-top: 120px !important;
				padding-bottom: 120px !important;
			}
		}









		/* FOR MOBILES LANDSCAPES (ML) */
		@media(max-width:800px) {

			.wauto-ml {
				width: auto !important;
			}

			.w0-ml {
				width: 0 !important;
			}

			.w5-ml {
				width: 5% !important;
			}

			.w10-ml {
				width: 10% !important;
			}

			.w15-ml {
				width: 15% !important;
			}

			.w20-ml {
				width: 20% !important;
			}

			.w25-ml {
				width: 25% !important;
			}

			.w30-ml {
				width: 30% !important;
			}

			.w35-ml {
				width: 35% !important;
			}

			.w40-ml {
				width: 40% !important;
			}

			.w45-ml {
				width: 45% !important;
			}

			.w50-ml {
				width: 50% !important;
			}

			.w55-ml {
				width: 55% !important;
			}

			.w60-ml {
				width: 60% !important;
			}

			.w70-ml {
				width: 70% !important;
			}

			.w80-ml {
				width: 80% !important;
			}

			.w90-ml {
				width: 90% !important;
			}

			.w100-ml {
				width: 100% !important;
			}




			.fs10-ml {
				font-size: 10px !important;
			}

			.fs11-ml {
				font-size: 11px !important;
			}

			.fs12-ml {
				font-size: 12px !important;
			}

			.fs13-ml {
				font-size: 13px !important;
			}

			.fs14-ml {
				font-size: 14px !important;
			}

			.fs15-ml {
				font-size: 15px !important;
			}

			.fs16-ml {
				font-size: 16px !important;
			}

			.fs17-ml {
				font-size: 17px !important;
			}

			.fs18-ml {
				font-size: 18px !important;
			}

			.fs19-ml {
				font-size: 19px !important;
			}

			.fs20-ml {
				font-size: 20px !important;
			}

			.fs21-ml {
				font-size: 21px !important;
			}

			.fs24-ml {
				font-size: 24px !important;
			}

			.fs30-ml {
				font-size: 30px !important;
			}

			.fs36-ml {
				font-size: 36px !important;
			}

			.fs42-ml {
				font-size: 42px !important;
			}

			.fs48-ml {
				font-size: 48px !important;
			}

			.fs60-ml {
				font-size: 60px !important;
			}

			.fs72-ml {
				font-size: 72px !important;
			}

			.fs90-ml {
				font-size: 90px !important;
			}

			.fs120-ml {
				font-size: 120px !important;
			}



			.flex-ml {
				display: flex !important;
			}

			.flexww-ml {
				flex-wrap: wrap !important;
			}

			.flexwnw-ml {
				flex-wrap: nowrap !important;
			}

			.flexdr-ml {
				flex-direction: row !important;
			}

			.flexdrr-ml {
				flex-direction: row-reverse !important;
			}

			.flexdc-ml {
				flex-direction: column !important;
			}

			.flexdcr-ml {
				flex-direction: column-reverse !important;
			}

			.aic-ml {
				align-items: center !important;
			}

			.aifs-ml {
				align-items: flex-start !important;
			}

			.aife-ml {
				align-items: flex-end !important;
			}

			.jcc-ml {
				justify-content: center !important;
			}

			.jcsb-ml {
				justify-content: space-between !important;
			}

			.jcfs-ml {
				justify-content: flex-start !important;
			}

			.jcfe-ml {
				justify-content: flex-end !important;
			}



			.dnone-ml {
				display: none !important;
			}

			.dtable-ml {
				display: table !important;
			}

			.dblock-ml {
				display: block !important;
			}

			.dflex-ml {
				display: flex !important;
			}




			.mb0-ml {
				margin-bottom: 0 !important;
			}

			.mb5-ml {
				margin-bottom: 5px !important;
			}

			.mb10-ml {
				margin-bottom: 10px !important;
			}

			.mb15-ml {
				margin-bottom: 15px !important;
			}

			.mb20-ml {
				margin-bottom: 20px !important;
			}

			.mb25-ml {
				margin-bottom: 25px !important;
			}

			.mb30-ml {
				margin-bottom: 30px !important;
			}

			.mb40-ml {
				margin-bottom: 40px !important;
			}

			.mb50-ml {
				margin-bottom: 50px !important;
			}

			.pb0-ml {
				padding-bottom: 0px !important;
			}

			.pb5-ml {
				padding-bottom: 5px !important;
			}

			.pb10-ml {
				padding-bottom: 10px !important;
			}

			.pb15-ml {
				padding-bottom: 15px !important;
			}

			.pb20-ml {
				padding-bottom: 20px !important;
			}

			.pb25-ml {
				padding-bottom: 25px !important;
			}

			.pb30-ml {
				padding-bottom: 30px !important;
			}

			.pb40-ml {
				padding-bottom: 40px !important;
			}

			.pb50-ml {
				padding-bottom: 50px !important;
			}

			.pb60-ml {
				padding-bottom: 60px !important;
			}

			.pb70-ml {
				padding-bottom: 70px !important;
			}

			.pb80-ml {
				padding-bottom: 80px !important;
			}

			.pb90-ml {
				padding-bottom: 90px !important;
			}

			.pb100-ml {
				padding-bottom: 100px !important;
			}

			.pb120-ml {
				padding-bottom: 120px !important;
			}

			.pt0-ml {
				padding-mlop: 0px !important;
			}

			.pt5-ml {
				padding-mlop: 5px !important;
			}

			.pt10-ml {
				padding-mlop: 10px !important;
			}

			.pt15-ml {
				padding-mlop: 15px !important;
			}

			.pt20-ml {
				padding-mlop: 20px !important;
			}

			.pt25-ml {
				padding-mlop: 25px !important;
			}

			.pt30-ml {
				padding-mlop: 30px !important;
			}

			.pt40-ml {
				padding-mlop: 40px !important;
			}

			.pt50-ml {
				padding-mlop: 50px !important;
			}

			.pt60-ml {
				padding-mlop: 60px !important;
			}

			.pt70-ml {
				padding-mlop: 70px !important;
			}

			.pt80-ml {
				padding-mlop: 80px !important;
			}

			.pt90-ml {
				padding-mlop: 90px !important;
			}

			.pt100-ml {
				padding-mlop: 100px !important;
			}

			.pt120-ml {
				padding-mlop: 120px !important;
			}

			.pl0-ml {
				padding-left: 0 !important;
			}

			.pl5-ml {
				padding-left: 5px !important;
			}

			.pl10-ml {
				padding-left: 10px !important;
			}

			.pl15-ml {
				padding-left: 15px !important;
			}

			.pl20-ml {
				padding-left: 20px !important;
			}

			.pl25-ml {
				padding-left: 25px !important;
			}

			.pl30-ml {
				padding-left: 30px !important;
			}

			.pl40-ml {
				padding-left: 40px !important;
			}

			.pl50-ml {
				padding-left: 50px !important;
			}

			.pl60-ml {
				padding-left: 60px !important;
			}

			.pl70-ml {
				padding-left: 70px !important;
			}

			.pl80-ml {
				padding-left: 80px !important;
			}

			.pl90-ml {
				padding-left: 90px !important;
			}

			.pl100-ml {
				padding-left: 100px !important;
			}

			.pl120-ml {
				padding-left: 120px !important;
			}

			.pr0-ml {
				padding-right: 0px !important;
			}

			.pr5-ml {
				padding-right: 5px !important;
			}

			.pr10-ml {
				padding-right: 10px !important;
			}

			.pr15-ml {
				padding-right: 15px !important;
			}

			.pr20-ml {
				padding-right: 20px !important;
			}

			.pr25-ml {
				padding-right: 25px !important;
			}

			.pr30-ml {
				padding-right: 30px !important;
			}

			.pr40-ml {
				padding-right: 40px !important;
			}

			.pr50-ml {
				padding-right: 50px !important;
			}

			.pr60-ml {
				padding-right: 60px !important;
			}

			.pr70-ml {
				padding-right: 70px !important;
			}

			.pr80-ml {
				padding-right: 80px !important;
			}

			.pr90-ml {
				padding-right: 90px !important;
			}

			.pr100-ml {
				padding-right: 100px !important;
			}

			.pr120-ml {
				padding-right: 120px !important;
			}

			.ptb0-ml {
				padding-mlop: 0 !important;
				padding-bottom: 0 !important;
			}

			.ptb5-ml {
				padding-mlop: 5px !important;
				padding-bottom: 5px !important;
			}

			.ptb10-ml {
				padding-mlop: 10px !important;
				padding-bottom: 10px !important;
			}

			.ptb15-ml {
				padding-mlop: 15px !important;
				padding-bottom: 15px !important;
			}

			.ptb20-ml {
				padding-mlop: 20px !important;
				padding-bottom: 20px !important;
			}

			.ptb25-ml {
				padding-mlop: 25px !important;
				padding-bottom: 25px !important;
			}

			.ptb30-ml {
				padding-mlop: 30px !important;
				padding-bottom: 30px !important;
			}

			.ptb40-ml {
				padding-mlop: 40px !important;
				padding-bottom: 40px !important;
			}

			.ptb50-ml {
				padding-mlop: 50px !important;
				padding-bottom: 50px !important;
			}

			.ptb60-ml {
				padding-mlop: 60px !important;
				padding-bottom: 60px !important;
			}

			.ptb70-ml {
				padding-mlop: 70px !important;
				padding-bottom: 70px !important;
			}

			.ptb80-ml {
				padding-mlop: 80px !important;
				padding-bottom: 80px !important;
			}

			.ptb90-ml {
				padding-mlop: 90px !important;
				padding-bottom: 90px !important;
			}

			.ptb100-ml {
				padding-mlop: 100px !important;
				padding-bottom: 100px !important;
			}

			.ptb120-ml {
				padding-mlop: 120px !important;
				padding-bottom: 120px !important;
			}
		}




		/* FOR MOBILES (M) */
		@media(max-width:600px) {


			.wauto-m {
				width: auto !important;
			}

			.w0-m {
				width: 0 !important;
			}

			.w5-m {
				width: 5% !important;
			}

			.w10-m {
				width: 10% !important;
			}

			.w15-m {
				width: 15% !important;
			}

			.w20-m {
				width: 20% !important;
			}

			.w25-m {
				width: 25% !important;
			}

			.w30-m {
				width: 30% !important;
			}

			.w35-m {
				width: 35% !important;
			}

			.w40-m {
				width: 40% !important;
			}

			.w45-m {
				width: 45% !important;
			}

			.w50-m {
				width: 50% !important;
			}

			.w55-m {
				width: 55% !important;
			}

			.w60-m {
				width: 60% !important;
			}

			.w70-m {
				width: 70% !important;
			}

			.w80-m {
				width: 80% !important;
			}

			.w90-m {
				width: 90% !important;
			}

			.w100-m {
				width: 100% !important;
			}


			.fs10-m {
				font-size: 10px !important;
			}

			.fs11-m {
				font-size: 11px !important;
			}

			.fs12-m {
				font-size: 12px !important;
			}

			.fs13-m {
				font-size: 13px !important;
			}

			.fs14-m {
				font-size: 14px !important;
			}

			.fs15-m {
				font-size: 15px !important;
			}

			.fs16-m {
				font-size: 16px !important;
			}

			.fs17-m {
				font-size: 17px !important;
			}

			.fs18-m {
				font-size: 18px !important;
			}

			.fs19-m {
				font-size: 19px !important;
			}

			.fs20-m {
				font-size: 20px !important;
			}

			.fs21-m {
				font-size: 21px !important;
			}

			.fs24-m {
				font-size: 24px !important;
			}

			.fs30-m {
				font-size: 30px !important;
			}

			.fs36-m {
				font-size: 36px !important;
			}

			.fs42-m {
				font-size: 42px !important;
			}

			.fs48-m {
				font-size: 48px !important;
			}

			.fs60-m {
				font-size: 60px !important;
			}

			.fs72-m {
				font-size: 72px !important;
			}

			.fs90-m {
				font-size: 90px !important;
			}

			.fs120-m {
				font-size: 120px !important;
			}



			.flex-m {
				display: flex !important;
			}

			.flexww-m {
				flex-wrap: wrap !important;
			}

			.flexwnw-m {
				flex-wrap: nowrap !important;
			}

			.flexdr-m {
				flex-direction: row !important;
			}

			.flexdrr-m {
				flex-direction: row-reverse !important;
			}

			.flexdc-m {
				flex-direction: column !important;
			}

			.flexdcr-m {
				flex-direction: column-reverse !important;
			}

			.aic-m {
				align-items: center !important;
			}

			.aifs-m {
				align-items: flex-start !important;
			}

			.aife-m {
				align-items: flex-end !important;
			}

			.jcc-m {
				justify-content: center !important;
			}

			.jcsb-m {
				justify-content: space-between !important;
			}

			.jcfs-m {
				justify-content: flex-start !important;
			}

			.jcfe-m {
				justify-content: flex-end !important;
			}



			.dnone-m {
				display: none !important;
			}

			.dtable-m {
				display: table !important;
			}

			.dblock-m {
				display: block !important;
			}

			.dflex-m {
				display: flex !important;
			}



			.mb0-m {
				margin-bottom: 0 !important;
			}

			.mb5-m {
				margin-bottom: 5px !important;
			}

			.mb10-m {
				margin-bottom: 10px !important;
			}

			.mb15-m {
				margin-bottom: 15px !important;
			}

			.mb20-m {
				margin-bottom: 20px !important;
			}

			.mb25-m {
				margin-bottom: 25px !important;
			}

			.mb30-m {
				margin-bottom: 30px !important;
			}

			.mb40-m {
				margin-bottom: 40px !important;
			}

			.mb50-m {
				margin-bottom: 50px !important;
			}

			.pb0-m {
				padding-bottom: 0px !important;
			}

			.pb5-m {
				padding-bottom: 5px !important;
			}

			.pb10-m {
				padding-bottom: 10px !important;
			}

			.pb15-m {
				padding-bottom: 15px !important;
			}

			.pb20-m {
				padding-bottom: 20px !important;
			}

			.pb25-m {
				padding-bottom: 25px !important;
			}

			.pb30-m {
				padding-bottom: 30px !important;
			}

			.pb40-m {
				padding-bottom: 40px !important;
			}

			.pb50-m {
				padding-bottom: 50px !important;
			}

			.pb60-m {
				padding-bottom: 60px !important;
			}

			.pb70-m {
				padding-bottom: 70px !important;
			}

			.pb80-m {
				padding-bottom: 80px !important;
			}

			.pb90-m {
				padding-bottom: 90px !important;
			}

			.pb100-m {
				padding-bottom: 100px !important;
			}

			.pb120-m {
				padding-bottom: 120px !important;
			}

			.pt0-m {
				padding-mop: 0px !important;
			}

			.pt5-m {
				padding-mop: 5px !important;
			}

			.pt10-m {
				padding-mop: 10px !important;
			}

			.pt15-m {
				padding-mop: 15px !important;
			}

			.pt20-m {
				padding-mop: 20px !important;
			}

			.pt25-m {
				padding-mop: 25px !important;
			}

			.pt30-m {
				padding-mop: 30px !important;
			}

			.pt40-m {
				padding-mop: 40px !important;
			}

			.pt50-m {
				padding-mop: 50px !important;
			}

			.pt60-m {
				padding-mop: 60px !important;
			}

			.pt70-m {
				padding-mop: 70px !important;
			}

			.pt80-m {
				padding-mop: 80px !important;
			}

			.pt90-m {
				padding-mop: 90px !important;
			}

			.pt100-m {
				padding-mop: 100px !important;
			}

			.pt120-m {
				padding-mop: 120px !important;
			}

			.pl0-m {
				padding-left: 0 !important;
			}

			.pl5-m {
				padding-left: 5px !important;
			}

			.pl10-m {
				padding-left: 10px !important;
			}

			.pl15-m {
				padding-left: 15px !important;
			}

			.pl20-m {
				padding-left: 20px !important;
			}

			.pl25-m {
				padding-left: 25px !important;
			}

			.pl30-m {
				padding-left: 30px !important;
			}

			.pl40-m {
				padding-left: 40px !important;
			}

			.pl50-m {
				padding-left: 50px !important;
			}

			.pl60-m {
				padding-left: 60px !important;
			}

			.pl70-m {
				padding-left: 70px !important;
			}

			.pl80-m {
				padding-left: 80px !important;
			}

			.pl90-m {
				padding-left: 90px !important;
			}

			.pl100-m {
				padding-left: 100px !important;
			}

			.pl120-m {
				padding-left: 120px !important;
			}

			.pr0-m {
				padding-right: 0px !important;
			}

			.pr5-m {
				padding-right: 5px !important;
			}

			.pr10-m {
				padding-right: 10px !important;
			}

			.pr15-m {
				padding-right: 15px !important;
			}

			.pr20-m {
				padding-right: 20px !important;
			}

			.pr25-m {
				padding-right: 25px !important;
			}

			.pr30-m {
				padding-right: 30px !important;
			}

			.pr40-m {
				padding-right: 40px !important;
			}

			.pr50-m {
				padding-right: 50px !important;
			}

			.pr60-m {
				padding-right: 60px !important;
			}

			.pr70-m {
				padding-right: 70px !important;
			}

			.pr80-m {
				padding-right: 80px !important;
			}

			.pr90-m {
				padding-right: 90px !important;
			}

			.pr100-m {
				padding-right: 100px !important;
			}

			.pr120-m {
				padding-right: 120px !important;
			}

			.ptb0-m {
				padding-mop: 0 !important;
				padding-bottom: 0 !important;
			}

			.ptb5-m {
				padding-mop: 5px !important;
				padding-bottom: 5px !important;
			}

			.ptb10-m {
				padding-mop: 10px !important;
				padding-bottom: 10px !important;
			}

			.ptb15-m {
				padding-mop: 15px !important;
				padding-bottom: 15px !important;
			}

			.ptb20-m {
				padding-mop: 20px !important;
				padding-bottom: 20px !important;
			}

			.ptb25-m {
				padding-mop: 25px !important;
				padding-bottom: 25px !important;
			}

			.ptb30-m {
				padding-mop: 30px !important;
				padding-bottom: 30px !important;
			}

			.ptb40-m {
				padding-mop: 40px !important;
				padding-bottom: 40px !important;
			}

			.ptb50-m {
				padding-mop: 50px !important;
				padding-bottom: 50px !important;
			}

			.ptb60-m {
				padding-mop: 60px !important;
				padding-bottom: 60px !important;
			}

			.ptb70-m {
				padding-mop: 70px !important;
				padding-bottom: 70px !important;
			}

			.ptb80-m {
				padding-mop: 80px !important;
				padding-bottom: 80px !important;
			}

			.ptb90-m {
				padding-mop: 90px !important;
				padding-bottom: 90px !important;
			}

			.ptb100-m {
				padding-mop: 100px !important;
				padding-bottom: 100px !important;
			}

			.ptb120-m {
				padding-mop: 120px !important;
				padding-bottom: 120px !important;
			}
		}
	</style>
	<style>
		:root {
			--default: 'Atkinson Hyperlegible';
			--blue: #1891ff;
			--dark: #333;
		}

		body {
			background: #fff;
		}

		body.disablescroll {
			overflow-y: hidden;
		}

		.container {
			width: 1200px;
			margin: 0 auto 0 auto;
		}






		header {
			position: fixed;
			width: 100%;
			left: 0;
			top: 0;
			z-index: 2;
			padding: 40px 0;
			transition: 0.3s;
		}

		header.fixed {
			background: #172da0;
			padding: 20px 0;
			box-shadow: 5px 5px 5px rgba(0, 0, 0, 0);
		}

		a.logo {
			float: left;
		}

		a.logo img {
			float: left;
			width: 180px;
			height: auto;
		}



		a.showmenu,
		a.hidemenu {
			display: none;
		}

		.menublock {
			float: right;
			margin: 0 0 0 0;
		}

		nav,
		nav ul,
		nav ul li {
			float: left;
		}

		nav ul li {
			font-family: var(--default);
			font-size: 14px;
			color: #fff;
			margin-right: 30px;
			text-transform: uppercase;
			letter-spacing: 3px;
		}

		nav ul li:last-of-type {
			margin-right: 0;
		}

		nav ul li a {
			float: left;
			color: #fff;
			text-decoration: none;
			padding: 8px 20px;
		}

		nav ul li.active a {
			background: #1891ff;
		}





		.banner {
			float: left;
			width: 100%;
			background: #2e4ae1;
			padding: 200px 0 100px 0;
		}

		.banner .text {
			float: left;
			width: 30%;
			font-family: var(--default);
		}

		.banner .text h1 {
			font-size: 72px;
			color: #fff;
			margin-bottom: 50px;
		}

		.banner .text p {
			font-size: 18px;
			color: #fff;
			margin-bottom: 50px;
		}

		.banner .text a {
			font-size: 21px;
			color: var(--blue);
			text-decoration: none;
			font-style: italic;
		}

		.banner .visual {
			float: right;
			width: 58%;
		}





		.about {
			float: left;
			width: 100%;
			padding: 100px 0 100px 0;
		}

		.about .text {
			float: left;
			width: 100%;
			font-family: var(--default);
		}

		.about .text h2 {
			width: 30%;
			font-size: 72px;
			color: #000;
			margin-bottom: 50px;
		}

		.about .text .para {
			width: 58%;
		}

		.about .text p {
			font-size: 18px;
			color: #000;
			margin-bottom: 20px;
		}

		.about .visual {
			float: left;
			width: 100%;
			margin-top: 60px;
		}

		.about .visual img {
			float: left;
			width: 100%;
			height: auto;
			aspect-ratio: 16/8;
		}



		.services {
			float: left;
			width: 100%;
			padding: 100px 0 100px 0;
			font-family: var(--default);
		}

		.services h2 {
			font-size: 72px;
			color: #000;
			margin-bottom: 50px;
		}

		.services-items {
			float: left;
			width: 100%;
		}

		.services-items .item {
			float: left;
			width: 30%;
			margin-bottom: 60px;
			padding: 40px 40px;
			text-align: center;
			background: #fff;
			border: 1px solid #ddd;
			color: #000;
			transition: 0.3s;
		}

		.services-items .item.type2 {
			background: #1891ff;
			border: 1px solid #116fc4;
			color: #fff;
		}

		.services-items .item i {
			width: 60px;
			height: 60px;
			font-size: 48px;
			margin-bottom: 20px;
			text-transform: uppercase;
		}

		.services-items .item h3 {
			font-size: 30px;
			margin-bottom: 20px;
		}

		.services-items .item p {
			font-size: 16px;
		}





		.projects {
			float: left;
			width: 100%;
			margin: 0 0 0 0;
			padding: 100px 0;
			background: #f7f7f7;
		}

		.project-item {
			float: left;
			width: 100%;
			margin-bottom: 100px;
		}

		.project-item:last-of-type {
			margin-bottom: 0;
		}

		.project-item .text {
			width: 45%;
			font-family: var(--default);
			color: #000;
		}

		.project-item .text h3 {
			font-size: 48px;
			margin-bottom: 30px;
		}

		.project-item .text p {
			font-size: 16px;
			margin-bottom: 20px;
		}

		.project-item .visual {
			width: 45%;
		}

		.project-item .visual img {
			float: left;
			width: 100%;
			height: auto;
			object-fit: cover;
			object-position: center;
			aspect-ratio: 16/9;
		}





		.contact {
			float: left;
			width: 100%;
			background: #2e4ae1;
			padding: 100px 0;
			font-family: var(--default);
		}

		.contact h2 {
			font-size: 72px;
			color: #fff;
			margin-bottom: 50px;
		}

		.contact-options {
			float: left;
			width: 100%;
			height: auto;
			margin: 0 0 0 0;
		}

		.formarea {
			float: left;
			width: 60%;
		}

		form.contactform {
			float: left;
			width: 100%;
		}

		form.contactform fieldset {
			float: left;
			width: 100%;
			border: none;
			margin-bottom: 30px;
		}

		form.contactform fieldset.half {
			width: 48%;
		}

		form.contactform fieldset.full {
			width: 100%;
		}

		form.contactform fieldset label {
			float: left;
			width: 100%;
			font-size: 16px;
			color: #fff;
			margin-bottom: 10px;
		}

		form.contactform fieldset input,
		form.contactform fieldset textarea {
			float: left;
			width: 100%;
			height: 48px;
			font-size: 16px;
			color: #000;
			margin-bottom: 10px;
			border: none;
			outline: 0;
			padding: 0 0 0 20px;
		}

		form.contactform fieldset textarea {
			height: 160px;
			padding: 20px;
		}

		form.contactform button {
			float: left;
			width: 190px;
			height: 52px;
			background: var(--blue);
			cursor: pointer;
			text-align: center;
			color: #fff;
			font-size: 16px;
			text-transform: uppercase;
			border: none;
		}

		.contact-info {
			float: right;
			width: 35%;
		}

		.contact-info ul {
			float: left;
			width: 100%;
		}

		.contact-info ul li {
			font-size: 18px;
			color: #fff;
			margin-bottom: 25px;
		}

		.contact-info ul li a {
			color: #fff;
		}


		footer {
			float: left;
			width: 100%;
			background: #172da0;
			padding: 40px 0;
		}

		footer .copyright {
			float: left;
			color: #fff;
			font-size: 16px;
			font-family: var(--default);
		}

		footer .copyright a {
			color: #fff;
			text-decoration: none;
		}

		footer .social {
			float: right;
		}

		footer .social a {
			float: left;
			color: #fff;
			font-size: 16px;
			margin-left: 10px;
			transition: 0.8s;
		}

		footer .social a:hover {
			color: var(--blue);
			transform: rotateY(360deg);
		}
	</style>
	<style>
		@media(max-width:1280px) {
			.container {
				width: 100%;
				padding: 0 30px;
			}


			header,
			header.fixed {
				padding: 20px 0;
			}

			a.logo img {
				width: 150px;
				height: auto;
			}


			a.showmenu {
				display: block;
				position: fixed;
				width: 42px;
				height: 42px;
				line-break: 42px;
				color: #fff;
				font-size: 42px;
				top: 20px;
				right: 30px;
			}

			a.hidemenu {
				display: none;
				position: fixed;
				width: 42px;
				height: 42px;
				line-break: 42px;
				color: #fff;
				font-size: 42px;
				top: 10px;
				right: 10px;
				z-index: 10;
			}

			nav {
				display: none;
				position: fixed;
				left: 0;
				top: 0;
				background: rgba(0, 0, 0, 0.9);
				width: 100%;
				height: 100%;
				z-index: 9;
				overflow-y: auto;
				padding: 140px 0;
			}

			nav ul {
				display: table;
				width: 240px;
				margin: 0 auto 0 auto;
				float: none;
			}

			nav ul li {
				float: left;
				width: 100%;
				margin-right: 0;
				margin-bottom: 30px;
			}

			nav ul li:last-of-type {
				margin-bottom: 0;
			}

			nav ul li a {
				float: left;
				width: 100%;
				text-align: center;
			}


			.banner {
				padding: 130px 0 70px 0;
			}

			.banner .visual {
				float: none;
				display: table;
				width: 500px;
				max-width: 100%;
				margin: 0 auto 50px auto;
			}

			.banner .text {
				float: left;
				width: 100%;
			}

			.banner .text h1 {
				font-size: 48px;
				margin-bottom: 30px;
			}

			.banner .text p {
				font-size: 15px;
				margin-bottom: 30px;
			}




			.about {
				padding: 60px 0;
			}

			.about .text {}

			.about .text h2 {
				width: 100%;
				font-size: 48px;
				color: #000;
				margin-bottom: 30px;
			}

			.about .text .para {
				width: 100%;
			}

			.about .visual {
				margin-top: 30px;
			}




			.services {
				padding: 60px 0;
			}

			.services h2 {
				font-size: 48px;
				margin-bottom: 30px;
			}

			.services-items .item {
				width: 48%;
				margin-bottom: 40px;
				padding: 30px;
			}

			.services-items .item i {
				width: 52px;
				height: 52px;
				font-size: 36px;
			}

			.services-items .item h3 {
				font-size: 21px;
				margin-bottom: 20px;
			}

			.services-items .item p {
				font-size: 15px;
			}





			.projects {
				padding: 60px 0;
			}

			.project-item {
				margin-bottom: 60px;
			}

			.project-item .text h3 {
				font-size: 36px;
				margin-bottom: 30px;
			}




			.contact {
				padding: 60px 0;
			}

			.contact h2 {
				font-size: 48px;
				margin-bottom: 30px;
			}
		}




		@media(max-width:540px) {
			.services-items .item {
				width: 100%;
			}


			.project-item .text,
			.project-item .visual {
				width: 100%;
			}

			.project-item .text {
				margin-bottom: 20px;
			}


			.formarea {
				float: left;
				width: 100%;
				margin-bottom: 60px;
			}

			form.contactform fieldset.half {
				width: 100%;
			}

			form.contactform fieldset {
				margin-bottom: 20px;
			}

			.contact-info {
				float: left;
				width: 100%;
			}



			footer .copyright {
				float: left;
				width: 100%;
				margin-bottom: 20px;
			}

			footer .social {
				float: left;
			}

			footer .social a {
				margin-left: 0;
				margin-right: 10px;
			}

			footer .social a:last-of-type {
				margin-right: 0;
			}
		}
	</style>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script>
		jQuery(document).ready(function($) {

			$(window).scroll(function() {
				if ($(this).scrollTop() >= 100) {
					$('header').addClass('fixed');
				} else {
					$('header').removeClass('fixed');
				}
			});

			var lastId,
				topMenu = $("#headnav"),
				topMenuHeight = topMenu.outerHeight() + 135,
				menuItems = topMenu.find("a"),
				scrollItems = menuItems.map(function() {
					var item = $($(this).attr("href"));
					if (item.length) {
						return item;
					}
				});

			menuItems.click(function(e) {
				var href = $(this).attr("href"),
					offsetTop = href === "#" ? 0 : $(href).offset().top - 120;
				$('html, body').stop().animate({
					scrollTop: offsetTop
				}, 1200);
				e.preventDefault();
			});

			$(window).scroll(function() {
				var fromTop = $(this).scrollTop() + topMenuHeight + 200;
				var cur = scrollItems.map(function() {
					if ($(this).offset().top < fromTop)
						return this;
				});
				cur = cur[cur.length - 1];
				var id = cur && cur.length ? cur[0].id : "";

				if (lastId !== id) {
					lastId = id;
					menuItems
						.parent().removeClass("active")
						.end().filter("[href='#" + id + "']").parent().addClass("active");
				}
			});
			$(".showmenu").click(function() {
				$("nav").fadeIn();
				$(this).next(".hidemenu").show();
				$('body').addClass('disablescroll');
			});
			$(".hidemenu").click(function() {
				$("nav").fadeOut();
				$(this).hide();
				$(this).prev(".showmenu").show();
				$('body').removeClass('disablescroll');
			});
			var viewportWidth = $(window).width();
			if (viewportWidth < 1200) {
				$("nav a").click(function() {
					$(this).parents("nav").fadeOut();
					$(".hidemenu").hide();
					$('body').removeClass('disablescroll');
				});
			}
		});
	</script>
</head>

<body id="home">
	<header>
		<div class="container flex-sb-aic">
			<a href="./" class="logo" style="width: 10px;">
				<img src="<?= base_url('assets/images/autofixicon_2.png') ?>" alt="">
			</a>
			<div class="menublock">
				<a href="javascript:void();" class="showmenu">
					<i class="fa-solid fa-bars"></i>
				</a>
				<a href="javascript:void();" class="hidemenu">
					<i class="fa-solid fa-xmark"></i>
				</a>
				<nav id="headnav">
					<ul>
						<li class="active">
							<a href="#home">Home</a>
						</li>
						<li>
							<a href="#about">About</a>
						</li>
						<li>
							<a href="#services">Services</a>
						</li>
						<li>
							<a href="#projects">Projects</a>
						</li>
						<li>
							<a href="<?= site_url('login') ?>">Login</a>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</header>
	<!--header-->
	<section class="banner">
		<div class="container">
			<div class="visual">
				<img src="assets/images/autofixkotse.jpg" alt="" class="img-default">
			</div>
			<div class="text">
				<h1>Welcome to AutoFix</h1>
				<p>Automatically optimize the garage car workshop with scheduling repairs, and streamlining workflow.</p>
			</div>
		</div>
	</section>
	<!--banner-->
	<section class="about" id="about">
		<div class="container">
			<div class="text flex-sb">
				<h2>About Us</h2>
				<div class="para">
					<p>At AutoFix Garage, we have built our reputation on over 15 years of expertise in the automotive industry, offering reliable and high-quality car repair and maintenance services. Our team of skilled technicians is committed to keeping your vehicle in top condition, whether it's through engine rebuilds, routine oil changes, or specialized services like air conditioning cleaning and ABS module repairs. We use state-of-the-art diagnostic tools and advanced techniques to ensure that every job is done right, giving you peace of mind on the road.</p>
					<p>Customer satisfaction is at the heart of what we do. We believe that every car deserves the best care, and our mission is to deliver services that are not only efficient but also tailored to your specific needs. At AutoFix Garage, we don’t just fix cars—we build trust by providing professional, dependable, and transparent services that keep your vehicle running smoothly for years to come.</p>
				</div>
			</div>
			<div class="visual">
				<img src="assets/images/Wirings.jpg" alt="" class="fit">
			</div>
		</div>
	</section>
	<!--about-->
	<section class="services" id="services">
		<div class="container">
			<h2>Services</h2>
			<div class="services-items flex-sb">
				<div class="item">
					<i class="fa-solid fa-city"></i>
					<h3>Engine Rebuild</h3>
					<p>Complete engine overhauls to restore power and improve vehicle performance.</p>
				</div>
				<div class="item type2">
					<i class="fa-solid fa-hand-holding-dollar"></i>
					<h3>Oil Change</h3>
					<p>Regular oil and filter replacements to ensure smooth engine operation and extend its lifespan.</p>
				</div>
				<div class="item">
					<i class="fa-solid fa-bullhorn"></i>
					<h3>Air Conditioning Cleaning</h3>
					<p>Thorough aircon system cleaning for improved cooling efficiency and air quality.</p>
				</div>
				<div class="item type2">
					<i class="fa-solid fa-comments"></i>
					<h3>Brake Repair</h3>
					<p>Expert diagnosis and repair of braking systems to ensure safe and reliable stopping power.</p>
				</div>
				<div class="item">
					<i class="fa-solid fa-people-group"></i>
					<h3>ABS Module Repair</h3>
					<p>Advanced troubleshooting and repair of ABS modules, including resolution of DTC error codes.</p>
				</div>
				<div class="item type2">
					<i class="fa-solid fa-recycle"></i>
					<h3>Tire Rotation and Balancing</h3>
					<p>Proper tire maintenance to improve fuel efficiency, prolong tire life, and enhance ride quality.</p>
				</div>
			</div>
		</div>
	</section>
	<!--about-->
	<section class="projects" id="projects">
		<div class="container">
			<div class="project-item flex-sb">
				<div class="text">
					<h3>Repair and Maintenance</h3>
					<p>At AutoFix Garage, we provide a full range of repair and maintenance services designed to keep your vehicle in top condition. Our experienced and skilled technicians are equipped to handle a variety of automotive needs, from routine maintenance to complex repairs, ensuring your car stays reliable and roadworthy.</p>
					<p>We use state-of-the-art equipment and advanced diagnostic tools to accurately assess and address any issues with your vehicle. With our commitment to quality service, you can trust that your car will be running smoothly and safely after every visit.</p>
				</div>
				<div class="visual">
					<img src="assets/images/autofix garage.jpg" alt="">
				</div>
			</div>
			<!--1-->
			<div class="project-item flex-sb-rv">
				<div class="text">
					<h3>Change oil</h3>
					<p>At AutoFix Garage, we offer professional oil change services to keep your engine running smoothly and efficiently. Regular oil changes are crucial for maintaining the health and performance of your vehicle, ensuring it operates at its best.</p>
					<p>By providing high-quality oils and filters, we help extend the lifespan of your engine and maintain optimal performance. Trust our team to deliver fast and reliable service, so your car continues to perform well on the road for years to come.</p>
				</div>
				<div class="visual">
					<img src="assets/images/Changeoil.jpg" alt="">
				</div>
			</div>
			<!--2-->
			<div class="project-item flex-sb">
				<div class="text">
					<h3>ABS Module Problem DTC U3000</h3>
					<p>AutoFix Garage specializes in diagnosing and resolving ABS module issues, including the complex DTC U3000 error code. Our experienced technicians are equipped with cutting-edge diagnostic tools to accurately detect the problem, ensuring a thorough and effective solution.</p>
					<p>With a focus on precision, we guarantee that your vehicle’s braking system is restored to optimal performance, improving both safety and reliability. Trust AutoFix Garage for expert brake repairs that keep you safe on the road.</p>
				</div>
				<div class="visual">
					<img src="assets/images/Wirings.jpg" alt="">
				</div>
			</div>
			<!--3-->
		</div>
	</section>
	<!--projects
	<section class="contact" id="contact">
		<div class="container">
			<h2>Contact Us</h2>
			<div class="contact-options flex-sb">
				<div class="formarea">
					<form id="contactform" method="post" action="form/contactform.php" class="contactform flex-sb">
						<fieldset class="half">
							<label>Name*</label>
							<input type="text" name="name">
						</fieldset>
						<fieldset class="half">
							<label>Email*</label>
							<input type="email" name="email">
						</fieldset>
						<fieldset class="half">
							<label>Subject*</label>
							<input type="text" name="subject">
						</fieldset>
						<fieldset class="half">
							<label>Phone*</label>
							<input type="text" name="phone">
						</fieldset>
						<fieldset class="full">
							<label>Message*</label>
							<textarea name="message"></textarea>
						</fieldset>
						<button type="submit" name="submit" id="submit">Submit &nbsp; <i class="fa-regular fa-envelope"></i>
						</button>
					</form>
				</div>
				<div class="contact-info">
					<ul>
						<li>
							<a href="#">
								<i class="fa-regular fa-envelope"></i> &nbsp; <strong>Email:</strong> info@youremail.com </a>
						</li>
						<li>
							<a href="#">
								<i class="fa-solid fa-phone"></i> &nbsp; <strong>Phone:</strong> (+) 222-333-444 </a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</section>-->
	<!--contact-->
	<footer>
		<div class="container">
			<div class="copyright">&copy; OVER 15 YEARS EXPERIENCE With over 15 years of experience, AutoFix Garage has been the trusted destination for reliable and expert car repairs.</div>
			<div class="social">
				<a href="#">
					<i class="fa-brands fa-facebook"></i>
				</a>
				<a href="#">
					<i class="fa-brands fa-x-twitter"></i>
				</a>
				<a href="#">
					<i class="fa-brands fa-instagram"></i>
				</a>
			</div>
		</div>
	</footer>
	<!--footer-->
</body>

</html>
