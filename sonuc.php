<?php 
	//Yapı Boyutları
$yapiUzunluk = $_POST['yapiUzunluk'];
$yapiGenislik = $_POST['yapiGenislik'];
$yapiCatiDuzlemiYerdenYukseklik = $_POST['yapiCatiDuzlemiYerdenYukseklik'];
$yapiCatiYerdenYukseklik = $POST['yapiCatiYerdenYukseklik'];
$toplamaAlani = $_POST['toplamaAlani'];


//Yapı-Çatı Malzemeleri
$yapiMalzemesi = $_POST['yapiMalzemesi'];
$catiMalzemesi = $_POST['catiMalzemesi'];

//Yapı Özellikleri
$fizikselHasarvYanginRiski = $_POST['fizikselHasarvYanginRiski'];
$yapininEkranlanmasi = $_POST['yapininEkranlanmasi'];
$kabloEkranlanmasiYapiOzellikleri = $_POST['kabloEkranlanmasiYapiOzellikleri'];

//Çevre Koşulları
$konumFaktoru = $_POST['konumFaktoru'];
$cevreFaktoru = $_POST['cevreFaktoru'];
$yillikGokGurultuluGunSayisi = $_POST['yillikGokGurultuluGunSayisi'];

//Servis Hatları ***value'ları tamamlanmadı.
$yapiyaGelenHattinTuru = $_POST['yapiyaGelenHattinTuru'];
$kabloEkranlanmasiEnerjiHatti = $_POST['kabloEkranlanmasiEnerjiHatti'];
$ogagTrafosununVarligi = $_POST['ogagTrafosununVarligi'];

$yerUstuIletkenServisSayisi = $_POST['yerUstuIletkenServisSayisi'];
$yerUstuYapiyaGelenHatTuru = $_POST['yerUstuYapiyaGelenHatTuru'];
$yerAltiIletkenServisSayisi = $_POST['yerAltiIletkenServisSayisi'];
$yerAltiYapiyaGelenHatTuru = $_POST['yerAltiYapiyaGelenHatTuru'];


//Koruma Önlemleri
$yildirimdanKorumaDuzeyi = $_POST['yildirimdanKorumaDuzeyi'];
$yangindanKorunmaTuru = $_POST['yangindanKorunmaTuru'];
$asiriGerilimdenKorunmaTuru = $_POST['asiriGerilimdenKorunmaTuru'];


//Kayıp Türü 1-2
$yasamsalTehlikeler = $_POST['yasamsalTehlikeler'];
$yangindanCanKaybi = $_POST['yangindanCanKaybi'];
$asiriGerilimdenCanKaybi = $_POST['asiriGerilimdenCanKaybi'];
$yangindanZararGorecekServis = $_POST['yangindanZararGorecekServis'];
$asiriGerilimdenZararGorecekServis = $_POST['asiriGerilimdenZararGorecekServis'];

//Kayıp Türü 3-4
$yanginNedeniyleKulturelMirasKaybi = $_POST['yanginNedeniyleKulturelMirasKaybi'];
$ekonomikZarar = $_POST['ekonomikZarar'];
$yanginNedeniyleEkonomikKayip = $_POST['yanginNedeniyleEkonomikKayip'];
$asiriGerilimNedeniyleEkonomikKayip = $_POST['asiriGerilimNedeniyleEkonomikKayip'];
$adimDokunmaGerilimiEtkisi = $_POST['adimDokunmaGerilimiEtkisi'];

//kabul edilir eko risk ***value tamamlanmadı
$kabulEdilirEkonomikRisk = $_POST['kabulEdilirEkonomikRisk'];

$Ae = $yapiUzunluk * $yapiGenislik + 6 * $yapiCatiDuzlemiYerdenYukseklik * ($yapiUzunluk + $yapiGenislik) + 9 * 3.14 * $yapiCatiDuzlemiYerdenYukseklik * $yapiCatiDuzlemiYerdenYukseklik;

echo $yillikGokGurultuluGunSayisi;

//**************************************************************

//**4.3 Bir yapıyla ilgili risk bileşenlerinin bileşimi

//4.3.1 Hasar kaynağına göre risk bileşenlerinin bileşimi 
$R = $Rd + $Ri;

//Rd = yapıya yıldırım düşmesinden dolayı yapı için risk
$Rd = $Ra + $Rb + $Rc;

//Ri = yapıya düşmeyen yıldırım dolayı yapı için risk
$Ri = $Rm + $Ru + $Rv + $Rw + $Rz;


//4.3.2 hasar tipine göre risk bileşenlerinin bileşimi
$R = $Rs + $Rf + $Ro;

//Rs = canlıların zarar görmesinden kaynaklanan risk
$Rs = $Ra + $Ru;

//Rf = yapıya fiziki hasardan kaynaklanan risk
$Rf = $Rb + $Rv;

//Ro = iç sistemlerin arızalanmasından kaynaklanan risk
$Ro = $Rm + $Rc + $Rw + $Rz;

//**************************************************************

//**4.4 bir hizmet tesisatı ile ilgili risk bileşenlerinin bileşimi

//R02 = kamu hizmeti kaybı riski
$R02 = $R0v + $R0w + $R0z + $R0b + $R0c;

//R04 = tesisatta ekonomik değer kaybı riski
$R04 = $R0v + $R0w + $R0z + $R0b + $R0c;


//**4.4.1 hasar kaynağına göre risk bileşenlerinin bileşimi
$R0 = $R0d +$R0i;

//R0d = hizmet tesisatına yıldırım düşmesinden dolayı yapı için risk
$R0d = $R0v + $R0w;

//R0i = hizmet tesisatına düşmeden hizmet tesisatını etkileyen yıldırımdan dolayı yapı için risk
$R0i = $R0b + $R0c + $R0z;

//**4.4.2 hasar tipine göre risk bileşenlerinin bileşimi
$R0 = $R0f + $R0o;

//R0f = yapıya fiziki hasardan kaynaklanan risk
$R0f = $R0v + $R0b;

//R0o = iç sistemlerin arızalanmasıdan kaynaklanan risk
$R0o = $R0w + $R0z + $R0c;

//**************************************************************

//**5 Risk yönetimi

//5.4 katlanılabilir risk Rt

if($kayipTipi == "insan hayatının kaybı veya kalıcı yaralanmalar"){
	
	$Rt = pow(10, -5);
}

else if($kayipTipi == "kamu hizmet kaybı"){

	$Rt = pow(10, -3);
}

else if($kayipTipi == "kültürel mirasın kaybı"){
	
	$Rt = pow(10, -3);
}

//**************************************************************

//**6 yapılar için risk bileşenlerinin değerlendirilmesi

//6.1 temel denklem
$Rx = $Nx * $Px * $Lx;

//Nx = yıllık tehlike olay sayısı
//Px = yapıya hasar gelmesi ihtimali
//Lx = dolaylı kayıp

//6.2 yapıya düşen yıldırımdan kaynaklanan risk bileşenlerinin değerlendirilmesi (S1)

//canlıların zarar görmesi ile ilgili bileşen (D1)
$Ra = $Nd * $Pa * $La;

//fiziki hasar ile ilgili bileşen (D2)
$Rb = $Nd * $Pb * $Lb;

//iç sistemlerin arızalanması ile ilgili bileşen (D3)
$Rc = $Nd * $Pc + $Lc;

//6.3 yapının yakınına düşen yıldırımdan kaynaklanan risk bileşenlerinin değerlendirilmesi (S2)

//iç sistemlerin arızalanması ile ilgili bileşen (D3)
$Rm = $Nm * $Pm * $Lm;

//6.4 yapıya bağlı hizmet tesisatına düşen yıldırımdan kaynaklana risk bileşenlerinin değerlendirilmesi (S3)

//canlıların zarar görmesi ile ilgili bileşen (D1)
$Ru = ($Nl + $Nda) * $Pu * $Lu;

//fiziki hasar ile ilgili bileşen (D2)
$Rv = ($Nl + $Nda) * $Pv * $Lv;

//iç sistemlerin arızalanması ile ilgili bileşen (D3)
$Rw = ($Nl + $Nda) * $Pw * $Lw;

//6.5 yapıya bağlı bir hizmet tesisatının yakınına düşen yıldırımdan kaynaklanan risk bileşenlerinin değerlendirilmesi (S4)

//iç sistemlerin arızalanması ile ilgili bileşen (D3)

$Rz = ($Ni - $Nl) * $Pz * $Lz;

//6.6 yapılar için risk bileşenlerinin özeti

if($hasarKaynagi == "S1 yapıya yıldırım düşmesi"){
	
	if($hasar == "D1 canlıların zarar görmesi"){
		
		$Ra = $Nd * $Pa * $ra * $Lt;
	}
	
	else if($hasar == "D2 fiziki hasar"){
		
		$Rb = $Nd * $Pb * $rp * $hz * $xrf * $Lf;
	}
	
	else if($hasar == "D3 elektrikli ve elektronik sistemlerin arızalanması"){
		
		$Rc = $Nd * $Pc * $Lo;
	}
	
	else if($hasar == "hasar kaynağına göre ortaya çıkan risk"){
		
		$Rd = $Ra + $Rb + $Rc;
	}
}

else if($hasarKaynagi == "S2 yapının yakınına yıldırım düşmesi"){
	
	if($hasar == "D3 elektrikli ve elektronik sistemlerin arızalanması"){
		
		$Rm = $Nm * $Pc * $Lo;
	}
	
	else($hasar == "hasar kaynağına göre ortaya çıkan risk"){
		
		$Ri = $Rm + $Ru + $Rv + $Rw + $Rz;
	}
}

else if($hasarKaynagi == "S3 yapıya giren hizmet tesisatına yıldırım düşmesi"){
	
	if($hasar == "D1 canlıların zarar görmesi"){
		
		$Ru = ($Nl + $Nda) * $Pu * $ru * $Lt;
	}
	
	else if($hasar == "D2 fiziki hasar"){
		
		$Rv = ($Nl + $Nda) * $Pv * $rp * $hz * $rf * $Lf;
	}
	
	else if($hasar == "D3 elektrikli ve elektronik sistemlerin arızalanması"){
		
		$Rw = ($Nl + $Nda) * $Pw * $Lo;
	}
	
	else if($hasar == "hasar kaynağına göre ortaya çıkan risk"){
		
		$Ri = $Rm + $Ru + $Rv + $Rw + $Rz;
	}
}
	
else if($hasarKaynagi == "S4 hizmet tesisatının yakınına yıldırım düşmesi"){
	
	if($hasar == "D3 elektrikli ve elektronik sistemlerin arızalanması"){
		
		$Rz = ($Ni - $Nl) * $Pz * $Lo;
	}
	
	else if($hasar == "hasar kaynağınına göre ortaya çıkan risk"){
	
		$Ri = $Rm + $Ru + $Rv + $Rw + $Rz;
	}
}
	
else if($hasarKaynagi == "hasar tipine göre ortaya çıkan risk"){
	
	if($hasar == "D1 Canlıların zarar görmesi"){
		
		$Ra = $Ra + $Ru;
	}
	
	else if($hasar == "D2 fiziki hasar"){
		
		$Rf = $Rb + $Rv;
	}
	
	else if($hasar == "D3 elektrikli ve elektronik sistemlerin arızalanması"){
		
		$Ro = $Rc + $Rm + $Rw + $Rz;
	}
}

//************************************************************

//**7.1 temel denklem

$R0x = $Nx + $P0x * $L0x;

//Nx = yıllık tehlikeli olay sayısı
//P0x hizmet tesisatına hasar gelmesi ihtimali
//Lx dolaylı kayıptır

//7.2 hizmet tesisatına düşen yıldırımdan kaynaklanan risk bileşenlerinin değerlendirilmesi (S3)

//fiziki hasar ile ilgili bileşen (D2)
$R0v = $Nl * $P0v * $L0v;

//bağlı cihazların arızalanması ile ilgili bileşen (D3)
$R0w = $Nl * $P0w * $L0w;

//7.3 hizmet tesisatının yakınına düşen yıldırımdan kaynaklanan risk bileşenlerinin değerlendirilmesi (S4)

//bağlı cihazların arızalanması ile ilgili bileşen (D3)
$R0z = ($Ni - $Nl) * $P0z * $L0z;

//7.4 hizmet tesisatının bağlı olduğu yapıya düşen yıldırımdan kaynaklanan risk bileşenlerinin değerlendirilmesi (S1)

//fiziki hasar ile ilgili bileşen (D2)
$R0b = $Nd * $P0b * $L0b;

//iç sistemlerin arızalanması ile ilgili bileşen (D3)
$R0c = $Nd * $P0c * $L0c;

//yıllık tehlikeli olay sayısının (N) değerlendirilmesi

//Toplama alanının (Ad) tayini
//dikdörtgen yapı
$Ad = $L * $W + 6 * $H * ($L + $W) + 9 * Math.PI * $H * $H;

//L, W, H metre.

//şekil karmaşık ise:
$A0d = 9 * Math.PI() * ($Hp * $Hp);

//Hp = çıkıntı yüksekliği

//A.2.3 yapı için tehlikeli olay sayısı (Nd)
$Nd = $Ng * $Adb * $Cdb * pow(10, -6);

/*
Ng = yıldırım düşme yoğunluğu (1/km² /yıl)
$Adb = tecrit edilmiş yapının toplama alanı (m²)
$Cdb = yapının yerleşim faktörüdür
*/

//A.2.4 bitişik yapı için tehlikeli olay sayısı (Nda)
$Nda = $Ng * $Ada * $Cda * $Ct * pow(10, -6);

/*
Ng = yıldırım düşme yoğunluğu
$Ada = tecrit edilmiş yapının toplama alanı
$Cda = yapının yerşelim faktörü
$Ct = yapının bağlı olduğu hizmet tesisatında, düşme noktası ile yapı arasında YG/OG transformatörü olmasına bağlı düzeltme faktörüdür. Bu faktör yapıya göre transformatörün üst tarafında bulunan hat bölümleri için geçerlidir
*/

//A.3 yapının yakınına yıldırım düşmesinden kaynaklanan ortalama yıllık tehlikeli olay sayısının (Nm) değerlendirilmesi

$Nm = $Ng * ($Am - $Adb * $Cdb) * pow(10, -6);

//Ng = yıldırım düşme yoğunluğu
//Am = yapının yakınına düşen yıldırımların toplama alanı

//A.4 hizmet tesisatına yıldırım düşmesinden kaynaklanan ortalama yıllık tehlikeli olay sayısı (Nl)

$Nl = $Ng * $Ai * $Cd * $Ct * pow(10, -6);

/*
Ng = yıldırım düşme yoğunluğu
Ai = hizmet tesisatına düşen yıldırımların toplama alanı
Cd = hzmet tesisatının yerleşim faktörü
Ct = yapının bağlı olduğu hizmet tesisatında, düşme noktası ile yapı arasında YG/OG transformatörü olmasına bağlı düzeltme faktörüdür. Bu faktör yapıya göre transformatörün üst tarafında bulunan hat bölümleri geçerlidir
*/
//hizmet tesisatının özelliklerine göre toplama alanları Al - Ai

if($ozellik == "havai"){
	
	$Al = ($Lc - 3 * ($Ha + $Hb)) * 6 * $Hc;
	$Ai = 1000 * $Lc;
}

else if($ozellik == "gömülü"){
	
	$Al = ($Lc - 3 * ($Ha + $Hb)) * sqrt($p);
	$Ai = 25 * $Lc * sqrt($p);
}

/*
Al = hizmet tesisatına düşen yıldırımların toplama alanı
Ai = hizmet tesisatının yakınında yere düşen yıldırımların toplama alanı
Hc = hizmet tesisatının iletkenlerinin yerden yüksekliği
Lc = hizmet tesisatı bölümünün yapı ile birinci düğüm arasındaki uzunluğu, azami olarak 1000m alınmalı
Ha = hizmet tesisatının a ucuna bağlı binanın yüksekliği
Hb = hizmet tesisatının b ucuna bağlı binanın yüksekliği
*/

if($tranformator == "iki sargılı transformatorlu hizmet tesisatı"){
	
	$Ct = 0.2;
}

else if($transformator == "sadece hizmet tesisatı"){
	
	$Ct = 1;
}

//A.5 hizmet tesisatının yakınına yıldırım düşmesinden kaynaklanan ortalama yıllık tehlikeli olay sayısı (Nl)
$Nl = $Ng * $Ai * $Ce * $Ct * pow(10, -6);

/*
Ng = yıldırım düşme yoğunluğu
Ai = hizmet tesisatının yakınında yere düşen yıldırımların toplama alanı
Ce = çevre faktörü
Ct = yapının bağlı olduğu hizmet tesisatında, düşme noktası ile yapı arasında YG/OG transformatörü olmasına bağlı düzeltme faktörüdürü. Bu faktör yapıya göre transformatörün üst tarafında bulunan hat bölümleri için geçerlidir.
*/

//Ce

if($cevre == "yüksek binalı şehir"){
	
	$Ce = 0;
}

else if($cevre == "Şehir"){
	
	$Ce = 0.1;
}

else if($cevre == "Banliyö"){
	
	$Ce = 0.5;
}

else if($cevre == "Kırsal"){
	
	$Ce = 1;
} 

//********************************************************

//**bir yapıya hasar gelme ihtimali (Px)

//B.1
if($korunmaTedbiri == "korunma tedbiri yok"){
	
	$Pa = 1;
}

else if($korunmaTedbiri == "açıktaki iniş iletkenlerinin elektrik yalıtımı"){
	
	$Pa = pow(10, -2);
}

else if($korunmaTedbiri == "etkin zemin eş potansiyel kuşaklaması"){
	
	$Pa = pow(10, -2);
}

else if($korunmaTedbiri == "ikaz işaretleri"){
	
	$Pa = pow(10, -1);
}

//**Yapıya yıldırım düşmesinin fiziki hasara sebep olma ihtimali (Pb)

if($yapiOzellikleri == "LPS ile korunmuyor"){
	
	$LPS = 0;
	$Pb = 1;
}

else if($yapiOzellikleri == "LPS ile korunuyor"){
	
	if($LPS == 4){
		
		$Pb = 0.2;
	}
	
	else if($LPS == 3){
		
		$Pb = 0.1;
	}
	
	else if($LPS == 2){
		
		$Pb = 0.05;
	}
	
	else if($LPS == 1){
		
		$Pb = 0.02
	}
}

else if($yapiOzellikleri == "yapının LPS 1e uygun hava sonlandırma sistemi ve tabii iniş iletkeni olarak çalışan sürekli metal veya takviyeli beton iskeleti var"){
	
	$Pb = 0.01;
}

else if($yapiOzellikleri == "yapının metal çatısı veya çatıdaki bütün tesisatı doğrudan yıldırım düşmesine karşı tamamaen koruyan, mujtemelen tabii bileşenlere sahip bir hava sonlandırma sistemi ve tabii iniş iletkeni olarak çalışan sürekli metal veya takviyeli beton iskeleti var"){
	
	$Pb = 0.001;
}

//***********************************************************

//**B.3 yapıya yıldırım düşmesinin iç sistemlerein arızalanmasına sebep olma ihtimali (Pc)

$Pc = $Pspd;

//Pspd- >

if($LPL == "koordineli SPD korunması yok"){
	
	$Pspd = 1;
}

else if($LPL == "3 - 4"){
	
	$Pspd = 0.03;
}

else if($LPL == "2"){
	
	$Pspd = 0.02;
}

else if($LPL == "1"){
	
	$Pspd = 0.01;
}

else if($LPL == "Not 3"){
	
	$Pspd = 0.004;
}

//**********************************************************

//** yapının yakınına düşmesinin iç sistemlerin arızalanmasına sebep olma ihtimali (Pm)

//SPD korunması sağlanmadığı zaman Pm değeri Pms değerine eşit olur
$Pm = $Kms;

//Kms = benimsenen korunma tedbirlerinin performansıyla ilgili bir faktördür

if($Kms >= 0.4){
	
	$Pms = 1;
}

else if($Kms < 0.4 && $Kms >= 0.15){
	
	$Pms = 0.9;
}

else if($Kms < 0.15 && $Kms >= 0.7){
	
	$Pms = 0.5;
}

else if($Kms < 0.7 && $Kms >= 0.035){
	
	$Pms = 0.1;
}

else if($Kms < 0.035 && $Kms >= 0.021){
	
	$Pms = 0.01;
}

else if($Kms < 0.021 && $Kms >= 0.016){
	
	$Pms = 0.005;
}

else if($Kms < 0.016 && $Kms >= 0.015){
	
	$Pms = 0.003;
}

else if($Kms < 0.015 &&  $Kms >= 0.014){
	
	$Pms = 0.001;
}

else if($Kms <= 0.013){
	
	$Pms = 0.0001;
}

//Kms değeri:
$Kms = $Ks1 * $Ks2 * $Ks3 * $Ks4;

//Ks1 = yapının LPS nin veya LPZ 0/1 sınırındaki diğer ekranların ekranlama etkinliği dikkate alır

//Ks2 = yapının içinde LPZ X/Y (X>0, Y>1) sınırındaki ekranlama  etkinliğini dikkate alır

//Ks3 = iç kablo tesisatının özelliklerini dikkate alır

//Ks4 = korunan sistemin darbeye dayanma gerilimini dikkate alır

$Ks1 = $Ks2 = 0.12 * $w;
	
//w = uzaysal ızgara benzeri ekranların veya ızgara tipi LPS iniş iletkenlerinin ızgara genişliği veya yapının metal sütunları arasındaki mesafe veya tabii LPS olarak çalışan takviyeli betonarme iskeletin aralık mesafesidir.

//Ks3

if($icTesisatTipi == "Ekransız kablo 1"){
	
	$Ks3 = 1;
}

else if($icTesisatTipi == "Ekransız kablo 2"){
	
	$Ks3 = 0.2;
}

else if($icTesisatTipi == "Ekransız kablo 3"){
	
	$Ks3 = 0.02;
}

else if($icTesisatTipi == "Ekranlı kablo 1"){
	
	$Ks3 = 0.001;
}

else if($icTesisatTipi == "Ekranlı kablo 2"){
	
	$Ks3 = 0.0002;
}

else if($icTesisatTipi == "Ekranlı kablo 3"){
	
	$Ks3 = 0.0001;
}


//Ks4
//Uw = korunan sistemin darbe dayanma gerilimi
$Ks4 = 1.5 / $Uw;
	
//Pld
if($Uw == 1.5){
	
	if($Rs > 5 && $Rs <= 20){
		
		$Pld = 1;
	}
	
	else if($Rs > 1 && $Rs <= 5){
		
		$Pld = 0.8;
	}
	
	else if($Rs <= 1){
		
		$Pld = 0.4;
	}
}

else if($Uw == 2.5){
	
	if($Rs > 5 && $Rs <= 20){
		
		$Pld = 0.95;
	}
	
	else if($Rs > 1 && $Rs <= 5){
		
		$Pld = 0.6;
	}
	
	else if($Rs <= 1){
		
		$Pld = 0.2;
	}
}

else if($Uw == 4){
	
	if($Rs > 5 && $Rs <= 20){
		
		$Pld = 0.9;
	}
	
	else if($Rs > 1 && $Rs <= 5){
		
		$Pld = 0.3;
	}
	
	else if($Rs <= 1){
		
		$Pld = 0.04;
	}
}

else if($Uw == 6){
	
	if($Rs > 5 && $Rs <= 20){
		
		$Pld = 0.8;
	}
	
	else if($Rs > 1 && $Rs <= 5){
		
		$Pld = 0.1;
	}
	
	else if($Rs <= 1){
		
		$Pld = 0.02;
	}
}

//**********************************************************

//hizmet tesisatına yıldırım düşmesinin fiziki hasara sebep olma ihtimali (Pv)




?>
<html lang="en">
<head>
	<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="theme-color" content="#33cccc">
	<title>Risk Analiz Sonucu</title>
	<link rel="stylesheet" href="css/sonuc.css">
</head>	
<body>
	<div class="form">
		<table id="t01">
			<h4>Risk Analiz Sonuçları</h4>
			<tr>
				<th>Kayıp Türü:</th>
				<th>Kabul Edilir Risk:</th>
				<th>Doğrudan Çarpma Riski:</th>
				<th>Dolaylı Çarpma Riski:</th>
				<th>Toplam Risk:</th>
			</tr>
			<tr>
				<td>Can Kaybı</td>
				<td>1,00E-05</td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td>Servis Kaybı</td>
				<td>1,00E-03</td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td>Kültürel Miras Kaybı</td>
				<td>1,00E-03</td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td>Ekonomik Kayıp</td>
				<td>1,00E-05</td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
		</table>
	</div>
</body>
</html>