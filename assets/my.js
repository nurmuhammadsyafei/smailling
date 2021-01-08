function opendimana() {
	$(".askdimana").show(100);
}
function closedimana() {
	$(".askdimana").hide(100);
}

function closeask_comp_1() {
	$(".optionask_comp_1").hide(100);
	// document.getElementById("optionask_comp_1").disabled = true;
}
function openask_comp_1() {
	// alert("ok");
	$(".optionask_comp_1").show(100);
	// document.getElementById("optionask_comp_1").disabled = false;
}

function getstatusHTC() {
	document.getElementById("statushasil").innerHTML = "HTC";
	document.getElementById("statushasilinput").value = "HTC";
}
function getstatusCALL() {
	document.getElementById("statushasil").innerHTML = "CALL";
	document.getElementById("statushasilinput").value = "CALL";
}

function gettglcallapk1() {
	// alert("a");
	var today = new Date();
	var tahun = today.getFullYear();
	var tgl = today.getDate();
	var bln = today.getMonth() + 1;
	var jam = today.getHours();
	var menit = today.getMinutes();
	var detik = today.getSeconds();
	// alert(tahun);
	document.getElementById("apk_call_start1").value =
		tahun + "-" + bln + "-" + tgl + " " + jam + ":" + menit + ":" + detik;
	document.getElementById("result_apk_call_start").value =
		tahun + "-" + bln + "-" + tgl + " " + jam + ":" + menit + ":" + detik;
}

function gettglcallapk2() {
	// alert("a");
	var today = new Date();
	var tahun = today.getFullYear();
	var tgl = today.getDate();
	var bln = today.getMonth() + 1;
	var jam = today.getHours();
	var menit = today.getMinutes();
	var detik = today.getSeconds();
	// alert(tahun);
	document.getElementById("apk_call_start2").value =
		tahun + "-" + bln + "-" + tgl + " " + jam + ":" + menit + ":" + detik;
	document.getElementById("result_apk_call_start").value =
		tahun + "-" + bln + "-" + tgl + " " + jam + ":" + menit + ":" + detik;
}
function gettglcallapk3() {
	// alert("a");
	var today = new Date();
	var tahun = today.getFullYear();
	var tgl = today.getDate();
	var bln = today.getMonth() + 1;
	var jam = today.getHours();
	var menit = today.getMinutes();
	var detik = today.getSeconds();
	// alert(tahun);
	document.getElementById("apk_call_start3").value =
		tahun + "-" + bln + "-" + tgl + " " + jam + ":" + menit + ":" + detik;
	document.getElementById("result_apk_call_start").value =
		tahun + "-" + bln + "-" + tgl + " " + jam + ":" + menit + ":" + detik;
}
function gettglcallapk1end() {
	// alert("a");
	var today = new Date();
	var tahun = today.getFullYear();
	var tgl = today.getDate();
	var bln = today.getMonth() + 1;
	var jam = today.getHours();
	var menit = today.getMinutes();
	var detik = today.getSeconds();
	// alert(tahun);
	document.getElementById("apk_call_end1").value =
		tahun + "-" + bln + "-" + tgl + " " + jam + ":" + menit + ":" + detik;
	document.getElementById("result_apk_call_end").value =
		tahun + "-" + bln + "-" + tgl + " " + jam + ":" + menit + ":" + detik;
}
function gettglcallapk2end() {
	// alert("a");
	var today = new Date();
	var tahun = today.getFullYear();
	var tgl = today.getDate();
	var bln = today.getMonth() + 1;
	var jam = today.getHours();
	var menit = today.getMinutes();
	var detik = today.getSeconds();
	// alert(tahun);
	document.getElementById("apk_call_end2").value =
		tahun + "-" + bln + "-" + tgl + " " + jam + ":" + menit + ":" + detik;
	document.getElementById("result_apk_call_end").value =
		tahun + "-" + bln + "-" + tgl + " " + jam + ":" + menit + ":" + detik;
}
function gettglcallapk3end() {
	// alert("a");
	var today = new Date();
	var tahun = today.getFullYear();
	var tgl = today.getDate();
	var bln = today.getMonth() + 1;
	var jam = today.getHours();
	var menit = today.getMinutes();
	var detik = today.getSeconds();
	// alert(tahun);
	document.getElementById("apk_call_end3").value =
		tahun + "-" + bln + "-" + tgl + " " + jam + ":" + menit + ":" + detik;
	document.getElementById("result_apk_call_end").value =
		tahun + "-" + bln + "-" + tgl + " " + jam + ":" + menit + ":" + detik;
}
// -----------------------------------------------------

function gettglcallcomp1() {
	// alert("a");
	var today = new Date();
	var tahun = today.getFullYear();
	var tgl = today.getDate();
	var bln = today.getMonth() + 1;
	var jam = today.getHours();
	var menit = today.getMinutes();
	var detik = today.getSeconds();
	// alert(tahun);
	document.getElementById("comp_call_start1").value =
		tahun + "-" + bln + "-" + tgl + " " + jam + ":" + menit + ":" + detik;
	document.getElementById("result_comp_call_start").value =
		tahun + "-" + bln + "-" + tgl + " " + jam + ":" + menit + ":" + detik;
}

function gettglcallcomp2() {
	// alert("a");
	var today = new Date();
	var tahun = today.getFullYear();
	var tgl = today.getDate();
	var bln = today.getMonth() + 1;
	var jam = today.getHours();
	var menit = today.getMinutes();
	var detik = today.getSeconds();
	// alert(tahun);
	document.getElementById("comp_call_start2").value =
		tahun + "-" + bln + "-" + tgl + " " + jam + ":" + menit + ":" + detik;
	document.getElementById("result_comp_call_start").value =
		tahun + "-" + bln + "-" + tgl + " " + jam + ":" + menit + ":" + detik;
}
function gettglcallcomp3() {
	// alert("a");
	var today = new Date();
	var tahun = today.getFullYear();
	var tgl = today.getDate();
	var bln = today.getMonth() + 1;
	var jam = today.getHours();
	var menit = today.getMinutes();
	var detik = today.getSeconds();
	// alert(tahun);
	document.getElementById("comp_call_start3").value =
		tahun + "-" + bln + "-" + tgl + " " + jam + ":" + menit + ":" + detik;
	document.getElementById("result_comp_call_start").value =
		tahun + "-" + bln + "-" + tgl + " " + jam + ":" + menit + ":" + detik;
}
function gettglcallcomp1end() {
	// alert("a");
	var today = new Date();
	var tahun = today.getFullYear();
	var tgl = today.getDate();
	var bln = today.getMonth() + 1;
	var jam = today.getHours();
	var menit = today.getMinutes();
	var detik = today.getSeconds();
	// alert(tahun);
	document.getElementById("comp_call_end1").value =
		tahun + "-" + bln + "-" + tgl + " " + jam + ":" + menit + ":" + detik;
	document.getElementById("result_comp_call_end").value =
		tahun + "-" + bln + "-" + tgl + " " + jam + ":" + menit + ":" + detik;
}
function gettglcallcomp2end() {
	// alert("a");
	var today = new Date();
	var tahun = today.getFullYear();
	var tgl = today.getDate();
	var bln = today.getMonth() + 1;
	var jam = today.getHours();
	var menit = today.getMinutes();
	var detik = today.getSeconds();
	// alert(tahun);
	document.getElementById("comp_call_end2").value =
		tahun + "-" + bln + "-" + tgl + " " + jam + ":" + menit + ":" + detik;
	document.getElementById("result_comp_call_end").value =
		tahun + "-" + bln + "-" + tgl + " " + jam + ":" + menit + ":" + detik;
}
function gettglcallcomp3end() {
	// alert("a");
	var today = new Date();
	var tahun = today.getFullYear();
	var tgl = today.getDate();
	var bln = today.getMonth() + 1;
	var jam = today.getHours();
	var menit = today.getMinutes();
	var detik = today.getSeconds();
	// alert(tahun);
	document.getElementById("comp_call_end3").value =
		tahun + "-" + bln + "-" + tgl + " " + jam + ":" + menit + ":" + detik;
	document.getElementById("result_comp_call_end").value =
		tahun + "-" + bln + "-" + tgl + " " + jam + ":" + menit + ":" + detik;
}
// -----------------------------------------------------

function getstatusHTCCOMP() {
	document.getElementById("statushasilcomp").innerHTML = "HTC";
	document.getElementById("statushasilinputcomp").value = "HTC";
}
function getstatusCALLCOMP() {
	document.getElementById("statushasilcomp").innerHTML = "CALL";
	document.getElementById("statushasilinputcomp").value = "CALL";
}

function DisplayAsk1Apk(ask1_apk) {
	document.getElementById("ResultAsk1Apk").value = ask1_apk;
}
function DisplayAsk2Apk(ask2_apk) {
	document.getElementById("ResultAsk2Apk").value = ask2_apk; // NYATU DENGAN FUNCTION OPENDIMANA()
}
function DisplayAsk2_5Apk(ask2_5_apk) {
	document.getElementById("ResultAsk2_5Apk").value = ask2_5_apk;
}
function DisplayAsk3Apk(ask3_apk) {
	document.getElementById("ResultAsk3Apk").value = ask3_apk;
}
function DisplayAsk4Apk(ask4_apk) {
	document.getElementById("ResultAsk4Apk").value = ask4_apk;
}
function DisplayAsk5Apk(ask5_apk) {
	document.getElementById("ResultAsk5Apk").value = ask5_apk;
}
function DisplayAsk6Apk(ask6_apk) {
	document.getElementById("ResultAsk6Apk").value = ask6_apk;
}
function DisplayAsk7Apk(ask7_apk) {
	document.getElementById("ResultAsk7Apk").value = ask7_apk;
}
function DisplayAsk2Comp(ask2_comp) {
	document.getElementById("ResultAsk2Comp").value = ask2_comp;
}
function DisplayAsk3Comp(ask2_comp_ifno) {
	document.getElementById("ResultAsk3Comp").value = ask2_comp_ifno;
}

//FUNGSI AUTO GENERATE
function getHasilTeleGabungan() {
	var HtcApk = document.getElementById("statushasil").innerHTML; // HTC Aplikan
	var Stt1_Apk = document.getElementById("ResultAsk1Apk").value; // Pertanyaan 1
	var Stt2_Apk = document.getElementById("ResultAsk2Apk").value; // Pertanyaan 2 bertemu/tidak
	var Stt2_5_Apk = document.getElementById("ResultAsk2_5Apk").value; // Pertanyaan 2_5 / Online or no
	var Stt3_Apk = document.getElementById("ResultAsk3Apk").value; // Pertanyaan 3
	var Stt4_Apk = document.getElementById("ResultAsk4Apk").value; // Pertanyaan 4
	var Stt5_Apk = document.getElementById("ResultAsk5Apk").value; // Pertanyaan 5
	var Stt6_Apk = document.getElementById("ResultAsk6Apk").value; // Pertanyaan 6
	var Stt7_Apk = document.getElementById("ResultAsk7Apk").value; // Pertanyaan 7

	var HtcComp = document.getElementById("statushasilcomp").innerHTML; // HTC Company
	var Stt2_Comp = document.getElementById("ResultAsk2Comp").value; // Pertanyaan 2 , bekerja disitu , y/n
	var Stt3_Comp = document.getElementById("ResultAsk3Comp").value; // Jika Tidak | datatidaksesuai,resign,tidakdikenal

	// alert(Stt2_Comp);
	if (HtcApk == "HTC" && HtcComp == "HTC") {
		// Kondisi 1
		document.getElementById("hasilresultkategori").value = "HTC";
		document.getElementById("hasilbadcategory").value = "-";
		document.getElementById("followup").value = "Survey";
	} else if (HtcApk == "HTC" && HtcComp == "CALL" && Stt2_Comp == "1") {
		// Kondisi 2
		document.getElementById("hasilresultkategori").value =
			"Good Unclear Aplikan";
		document.getElementById("hasilbadcategory").value = "-";
		document.getElementById("followup").value = "Survey";
	} else if (
		HtcApk == "CALL" &&
		Stt1_Apk == "1" &&
		Stt2_Apk == "1" &&
		Stt3_Apk == "1" &&
		Stt4_Apk == "1" &&
		Stt5_Apk == "0" &&
		Stt6_Apk == "0" &&
		HtcComp == "HTC"
	) {
		// Kondisi 3
		document.getElementById("hasilresultkategori").value =
			"Good Unclear Kantor";
		document.getElementById("hasilbadcategory").value = "-";
		document.getElementById("followup").value = "Survey";
	} else if (
		HtcApk == "HTC" &&
		HtcComp == "CALL" &&
		Stt2_Comp == "0" &&
		Stt3_Comp != "tidakdikenal"
	) {
		// Kondisi 4
		document.getElementById("hasilresultkategori").value = "Bad";
		document.getElementById("hasilbadcategory").value = "Suspect Aplikan";
		document.getElementById("followup").value = "Survey";
	} else if (
		HtcApk == "HTC" &&
		HtcComp == "CALL" &&
		Stt2_Comp == "0" &&
		Stt3_Comp == "tidakdikenal"
	) {
		// Kondisi 5
		document.getElementById("hasilresultkategori").value = "Bad"; //Bad
		document.getElementById("hasilbadcategory").value = "Aplikan Unknow"; //Bad
		document.getElementById("followup").value = "Survey"; //Bad
	} else if (
		HtcApk == "CALL" &&
		Stt1_Apk == "1" &&
		Stt2_Apk == "1" &&
		Stt3_Apk == "1" &&
		Stt4_Apk == "1" &&
		Stt5_Apk == "0" &&
		Stt6_Apk == "0" &&
		HtcComp == "CALL" &&
		Stt2_Comp == "1"
	) {
		document.getElementById("hasilresultkategori").value = "Good";
		document.getElementById("hasilbadcategory").value = "-";
		document.getElementById("followup").value = "Clear";
	} else if (
		HtcApk == "CALL" &&
		Stt1_Apk == "1" &&
		Stt2_Apk == "1" &&
		Stt3_Apk == "1" &&
		Stt4_Apk == "1" &&
		Stt5_Apk == "0" &&
		Stt6_Apk == "0" &&
		HtcComp == "CALL" &&
		Stt2_Comp == "0" &&
		Stt3_Comp != "tidakdikenal"
	) {
		document.getElementById("hasilresultkategori").value = "Bad";
		document.getElementById("hasilbadcategory").value = "Suspect Aplikan";
		document.getElementById("followup").value = "Pemanggilan";
	} else if (
		HtcApk == "CALL" &&
		Stt1_Apk == "1" &&
		Stt2_Apk == "1" &&
		Stt3_Apk == "1" &&
		Stt4_Apk == "1" &&
		Stt5_Apk == "0" &&
		Stt6_Apk == "0" &&
		HtcComp == "CALL" &&
		Stt2_Comp == "0" &&
		Stt3_Comp == "tidakdikenal"
	) {
		document.getElementById("hasilresultkategori").value = "Bad";
		document.getElementById("hasilbadcategory").value = "Aplikan Unknow";
		document.getElementById("followup").value = "Pemanggilan";
	} else if (
		HtcApk == "CALL" &&
		Stt1_Apk == "1" &&
		Stt2_Apk == "1" &&
		Stt3_Apk == "0" &&
		Stt4_Apk == "1" &&
		Stt5_Apk == "0" &&
		Stt6_Apk == "0" &&
		HtcComp == "CALL"
	) {
		document.getElementById("hasilresultkategori").value = "Bad";
		document.getElementById("hasilbadcategory").value = "Suspect Sales";
		document.getElementById("followup").value = "Pemanggilan";
	} else if (
		HtcApk == "CALL" &&
		Stt1_Apk == "0" &&
		Stt2_Apk == "1" &&
		Stt3_Apk == "0" &&
		Stt4_Apk == "0" &&
		Stt5_Apk == "1" &&
		Stt6_Apk == "1"
	) {
		document.getElementById("hasilresultkategori").value = "Bad";
		document.getElementById("hasilbadcategory").value = "Suspect Sales";
		document.getElementById("followup").value = "Pemanggilan";
	} else if (
		HtcApk == "CALL" &&
		Stt1_Apk == "1" &&
		Stt2_Apk == "0" &&
		Stt2_5_Apk == "1" &&
		Stt3_Apk == "1" &&
		Stt4_Apk == "1" &&
		Stt5_Apk == "0" &&
		Stt6_Apk == "0"
	) {
		document.getElementById("hasilresultkategori").value = "Bad";
		document.getElementById("hasilbadcategory").value = "Suspect Sales";
		document.getElementById("followup").value = "Pemanggilan";
	} else {
		document.getElementById("hasilresultkategori").value = "Salah Server";
		document.getElementById("hasilbadcategory").value = "Salah Server";
		document.getElementById("followup").value = "Salah Server";
	}

	if (HtcApk == "CALL" && HtcComp == "CALL") {
		document.getElementById("fokus_surveyor").value = "-";
	} else if (HtcApk == "HTC" && HtcComp == "CALL") {
		document.getElementById("fokus_surveyor").value = "Aplicant";
	} else if (HtcApk == "CALL" && HtcComp == "HTC") {
		document.getElementById("fokus_surveyor").value = "Kantor";
	} else if (HtcApk == "HTC" && HtcComp == "HTC") {
		document.getElementById("fokus_surveyor").value = "ALL";
	}
}

function GetResult() {
	var apk_call_start1 = document.getElementById("apk_call_start1").value;
	var apk_call_start2 = document.getElementById("apk_call_start2").value;
	var apk_call_start3 = document.getElementById("apk_call_start3").value;
	var comp_call_start1 = document.getElementById("comp_call_start1").value;
	var comp_call_start2 = document.getElementById("comp_call_start2").value;
	var comp_call_start3 = document.getElementById("comp_call_start3").value;
	var result_apk_call_start = document.getElementById("result_apk_call_start")
		.value;
	var result_apk_call_end = document.getElementById("result_apk_call_end")
		.value;
	var no_hp = document.getElementById("no_hp").value;
	var pert1 = document.getElementById("ResultAsk1Apk").value;
	var pert2 = document.getElementById("ResultAsk2Apk").value;
	var pert3 = document.getElementById("ResultAsk3Apk").value;
	var pert4 = document.getElementById("ResultAsk4Apk").value;
	var pert5 = document.getElementById("ResultAsk5Apk").value;
	var pert6 = document.getElementById("ResultAsk6Apk").value;
	var pert7 = document.getElementById("ResultAsk7Apk").value;
	var infolain = document.getElementById("ask_apk_infolain").value;
	var statushasil = document.getElementById("statushasilinput").value;
	var notlp_ktr = document.getElementById("notlp_ktr").value;
	var result_comp_call_start = document.getElementById("result_comp_call_start")
		.value;
	var ask1_comp = document.getElementById("ask1_comp").value;
	var ask2_comp = document.getElementById("ResultAsk2Comp").value;
	var ask2_comp_ifno = document.getElementById("ask2_comp_ifno").value;
	var ask3_comp = document.getElementById("ask3_comp").value;
	var ask_comp_infolain = document.getElementById("ask_comp_infolain").value;
	var statushasilcomp = document.getElementById("statushasilinputcomp").value;

	// alert(statushasilcomp);
	if (pert1 == "0") {
		// KONDISI UNTUK PERTANYAAN 1
		var pert1new = ", Tidak Mengajukan";
	} else if (pert1 == "1") {
		var pert1new = ", Mengajukan";
	} else {
		var pert1new = "";
	}

	if (pert2 == "0") {
		// KONDISI UNTUK PERTANYAAN 2
		var pert2new = ", Tidak Bertemu Sales";
	} else if (pert2 == "1") {
		var di = document.getElementById("ask2_apk_dimana").value;
		var pert2new = ", Bertemu Sales di " + di;
	} else {
		var pert2new = "";
	}

	if (pert3 == "0") {
		// KONDISI UNTUK PERTANYAAN 3
		var pert3new = ", Tidak Isi Aplikasi dan Tidak Tanda tangan";
	} else if (pert3 == "1") {
		var pert3new = ", Isi Aplikasi dan Tanda tangan";
	} else {
		var pert3new = "";
	}

	if (pert4 == "0") {
		// KONDISI UNTUK PERTANYAAN 4
		var pert4new = ", Tidak Melengkapi Dokumen";
	} else if (pert4 == "1") {
		var pert4new = ", Sudah Melengkapi Dokumen";
	} else {
		var pert4new = "";
	}

	if (pert5 == "0") {
		// KONDISI UNTUK PERTANYAAN 5
		var pert5new = ", Sales Tidak Menjanjikan Annual Fee";
	} else if (pert5 == "1") {
		var pert5new = ", Sales Menjanjikan Annual Fee";
	} else {
		var pert5new = "";
	}

	if (pert6 == "0") {
		// KONDISI UNTUK PERTANYAAN 6
		var pert6new = ", Sales Tidak Meminta Imbalan";
	} else if (pert6 == "1") {
		var pert6new = ", Sales Meminta Imbalan";
	} else {
		var pert6new = "";
	}

	if (pert7 == "0") {
		// KONDISI UNTUK PERTANYAAN 7
		var pert7new = ", Tidak puas atas pelayanan Sales, ";
	} else if (pert7 == "1") {
		var pert7new = ", Puas atas pelayanan Sales, ";
	} else {
		var pert7new = "";
	}

	if (statushasil == "HTC") {
		// KONDISI UNTUK PERTANYAAN 7
		var statushasilnew = ", HTC";
		var pert1new = "";
		var pert2new = "";
		var pert3new = "";
		var pert4new = "";
		var pert5new = "";
		var pert6new = "";
		var pert7new = "";
		var infolain = "";
	} else if (statushasil == "CALL") {
		var statushasilnew = "";
	} else {
		var statushasilnew = "";
	}

	if (ask1_comp == "") {
		// KONDISI UNTUK PERTANYAAN 7
		var ask1_compnew = "";
	} else {
		var ask1_compnew = ", " + ask1_comp;
	}

	if (ask2_comp == "1") {
		// KONDISI UNTUK PERTANYAAN 7
		var ask2_compnew = ", Aplikan benar bekerja diperusahaan tersebut";
	} else if (ask2_comp == "0") {
		var ask2_compnew = ", Aplikan tidak bekerja diperusahaan tersebut";
	} else {
		var ask2_compnew = "";
	}

	if (ask2_comp_ifno == "") {
		// KONDISI UNTUK PERTANYAAN 7
		var ask2_comp_ifnonew = "";
	} else {
		var ask2_comp_ifnonew = ", " + ask2_comp_ifno;
	}

	if (ask2_comp_ifno == "") {
		// KONDISI UNTUK PERTANYAAN 7
		var ask2_comp_ifnonew = "";
	} else {
		var ask2_comp_ifnonew = ", " + ask2_comp_ifno;
	}

	if (ask3_comp == "") {
		// KONDISI UNTUK PERTANYAAN 7
		var ask3_compnew = "";
	} else {
		var ask3_compnew = ", " + ask3_comp;
	}

	if (ask_comp_infolain == "") {
		// KONDISI UNTUK PERTANYAAN 7
		var ask_comp_infolainnew = "";
	} else {
		var ask_comp_infolainnew = ", " + ask_comp_infolain;
	}

	if (statushasilcomp == "HTC") {
		// KONDISI UNTUK PERTANYAAN 7
		var statushasilcompnew = ", HTC";
		ask1_compnew = "";
		ask2_compnew = "";
		ask2_comp_ifnonew = "";
		ask3_compnew = "";
		ask_comp_infolainnew = "";
	} else if (statushasilcomp == "CALL") {
		var statushasilcompnew = "";
	} else {
		var statushasilcompnew = "";
	}

	// alert(pert1);

	document.getElementById("hasil_telev_aplikan").value =
		"Call Aplikan " +
		no_hp +
		" Jam " +
		result_apk_call_start +
		pert1new +
		pert2new +
		pert3new +
		pert4new +
		pert5new +
		pert6new +
		pert7new +
		infolain +
		statushasilnew;

	document.getElementById("hasil_telev_company").value =
		" .... Call Kantor " +
		notlp_ktr +
		" Jam " +
		result_comp_call_start +
		ask1_compnew +
		ask2_compnew +
		ask2_comp_ifnonew +
		ask3_compnew +
		ask_comp_infolainnew +
		statushasilcompnew;

	document.getElementById("hasiltelegabungan").value =
		"Call 1 Aplikan " +
		no_hp +
		" Jam " +
		apk_call_start1 +
		", Call 2 Aplikan " +
		apk_call_start2 +
		", Call 3 Aplikan " +
		apk_call_start3 +
		pert1new +
		pert2new +
		pert3new +
		pert4new +
		pert5new +
		pert6new +
		pert7new +
		infolain +
		statushasilnew +
		" || Call 1 Kantor " +
		notlp_ktr +
		" Jam " +
		comp_call_start1 +
		", Call 2 Kantor " +
		comp_call_start2 +
		", Call 3 Kantor " +
		comp_call_start3 +
		ask1_compnew +
		ask2_compnew +
		ask2_comp_ifnonew +
		ask3_compnew +
		ask_comp_infolainnew +
		statushasilcompnew;
}

// function openinput_apk() {
// 	$(".inpt_apk").prop("disabled", false);
// 	$(".inpt_apk").attr("checked", false).val("");
// }
// function closeinput_apk() {
// 	$(".inpt_apk").prop("disabled", true);
// 	$(".inpt_apk").attr("checked", false).val("");
// }

// function openinput_comp() {
// 	$(".inpt_comp").prop("disabled", false);
// 	$(".inpt_comp").attr("checked", false).val("");
// }
// function closeinput_comp() {
// 	$(".inpt_comp").prop("disabled", true);
// 	$(".inpt_comp").attr("checked", false).val("");
// }
function stargetdate() {
	alert("da");
	document.getElementById("apk_call_start1").date.getFullYear();
}
