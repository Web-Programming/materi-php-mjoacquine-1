<?php
namespace Kendaraan;
// cara penulisan class mobil
class mobil{
    public $warna;
    public $merk;

    //cara penulisan method
    function maju(){
        //isi method maju()
        return "Mobil Maju";
    }
        
    
    function berhenti (){
        //isi method berhenti()
        return "mobil berhenti";

    }

}
    


//instalasi object
use Kendaraan\mobil;
$mobil_heri = new mobil();
$mobil_anton = new mobil();

//set property
$mobil_heri->warna = "Merah";
$mobil_heri->merk = "Toyota";


//tampilkan property 
echo "Mobil Heri";
echo "<br>Warna : ", $mobil_heri->warna;
echo"<br>Merk : ", $mobil_heri->merk;

//tampilan method
echo"<br>";
echo $mobil_heri->maju();
echo"<br>";
echo $mobil_heri->berhenti();
?>


