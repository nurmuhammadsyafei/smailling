<?php
    class whatsAppBot{
    //specify instance URL and token
    var $APIurl = 'https://eu69.chat-api.com/instance65901/';
    var $token = '3bkh3bap1tgj9sxw';
    // var $pesan='';
    public function __construct(){
    // require_once 'kirim_pesan.php';
    // $kirim_pesan = new kirim_pesan();
    //get the JSON body from the instance
    $json = file_get_contents('php://input');
    $decoded = json_decode($json,true);
    //write parsed JSON-body to the file for debugging
    ob_start();
    var_dump($decoded);
    $input = ob_get_contents();
    ob_end_clean();
    file_put_contents('input_requests.log',$input.PHP_EOL,FILE_APPEND);
                            
    if(isset($decoded['messages'])){
        //check every new message
    foreach($decoded['messages'] as $message){
        //delete excess spaces and split the message on spaces. The first word in the message is a command, other words are parameters
        $text = explode(' ',trim($message['body']));
        //current message shouldn't be send from your bot, because it calls recursion
    
        
    if(!$message['fromMe'] ){
    //check what command contains the first word and call the function
    // $input = mb_strtolower($text[0],'UTF-8';
    $input1 = mb_strtolower($text[0], 'UTF-8');
    $input2 = mb_strtolower($text[1], 'UTF-8');
    $input3 = mb_strtolower($text[2], 'UTF-8');
    $input4 = mb_strtolower($text[3], 'UTF-8');
    $input5 = mb_strtolower($text[4], 'UTF-8');
    $input6 = mb_strtolower($text[5], 'UTF-8');
    $input7 = mb_strtolower($text[6], 'UTF-8');
    switch($input1){
    case 'hi':  {$this->welcome($message['chatId'],false); break;}
    case 'help':     {$this->help($message['chatId']); break;}
    case 'move':     {$this->update_pemimpin($message['chatId'],$input1,$input2,$input3); break;}
    case 'update':     {$this->update_kelompok($message['chatId'],$input1,$input2,$input3); break;}
    case 'grab':     {$this->grab($message['chatId'],$input1,$input2,$input3); break;}
    case 'reg':     {$this->insert_users($message['chatId'],$input1,$input2,$input3,$input4); break;}    
    case 'up':     {$this->update_users($message['chatId'],$input1,$input2,$input3,$input4,$input5,$input6); break;}
    case 'hook':     {$this->hook($message['chatId'],$input1,$input2,$input3); break;}
    default:        {$this->default($message['chatId']); break;}
        }
        
    }}
    }
    }// end of __construct
    //this function calls function sendRequest to send a simple message
    //@param $chatId [string] [required] - the ID of chat where we send a message
    //@param $text [string] [required] - text of the message
    public function help($chatId){
        require_once 'api.php';
        $api = new api();
        // $kontak='6287711086938';
        $kontak=str_replace('@c.us','',$chatId);
        $api->help($kontak);   
        
        }
    
    public function welcome($chatId, $noWelcome = false){
        require_once 'api.php';
        $api = new api();
        // $kontak='6287711086938';
        $kontak=str_replace('@c.us','',$chatId);
        $api->welcome($kontak);     
    }
//dev 01082019
    public function default($chatId){
        require_once 'users.php';
        $users = new users();
        $no_kontak=str_replace('@c.us','',$chatId);
        $res5 = $users->get_users($no_kontak);
        $ada_kontak = count($res5['kontak']);
    
        // $res6 = $users->get_kelompok(strtoupper($input3));
        // $ada_kelompok = count($res6['kelompok']);
    
        if($ada_kontak>0){
            $this->help($chatId);
        }else{
     require_once 'api.php';
     $api = new api();
    // $kontak='6287711086938';
     $kontak=str_replace('@c.us','',$chatId);
     $api->kirim_stiker_mugiwara($kontak);   
        }        
    }
public function hook($chatId,$input1,$input2,$input3){
    switch(mb_strtolower($input2)){
         case 'now':     {$this->hook_now($chatId,false); break;}  
         case 'dev':     {$this->hook_dev($chatId); break;}
         case 'prod':    {$this->hook_prod($chatId); break;}
        
        default:        {
            $this->welcome($chatId,true); 
        break;}
    }
}
//dev 25072019
    public function grab($chatId,$input1,$input2,$input3){
    // dev 28072019
    require_once 'users.php';
    $users = new users();
    $no_kontak=str_replace('@c.us','',$chatId);
    $res5 = $users->get_users($no_kontak);
    $ada_kontak = count($res5['kontak']);
    // $res6 = $users->get_kelompok(strtoupper($input3));
    // $ada_kelompok = count($res6['kelompok']);
    if($ada_kontak>0){
        //GRAB <SPASI> ????
        switch(mb_strtolower($input2)){
            //  case 'hi':  {$this->welcome($chatId,false); break;}
            //  case 'help':     {$this->help($chatId); break;}
            case 'order':    {
                if($res5['divisi']=='SLN'){
                    $this->grab_order($chatId);         
                }elseif($res5['divisi']=='HLB'){
                    $this->grab_order_hlb($chatId);           
                }elseif($res5['divisi']=='MCM'){
                    $this->grab_order_mcm($chatId);           
                }
            break;}
            case 'info':    {
                if($input3=='tim'){
                    $this->grab_info_tim($chatId);             
                }else{
                    $this->grab_info($chatId);             
                }
            break;}
            
            case 'stok':    {
                if($res5['divisi']=='SLN'){
                  $this->cek_stok($chatId);         
              }elseif($res5['divisi']=='HLB'){
                  $this->cek_stok_hlb($chatId);           
              }elseif($res5['divisi']=='MCM'){
                  $this->cek_stok_mcm($chatId);           
              }           
            break;}
            
            case 'report':    {
                $this->grab_report($chatId);             
            break;}
            
            default:        {$this->welcome($chatId,true); break;}
                }
        // $this->grab_order($chatId);             
    }else{
                                    $text2=
    "Upps.. \n".
    "-------------------------------------------------------\n".
    "No Anda Belum terdaftar silahkan Registrasi Terlebih dahulu untuk melakukan order  \n".
    "ketik REG <spasi> NAMA <spasi> KELOMPOK \n".    
    // "--------------------------------------------------------\n".                                       
    // "butuh bantuan? --> ketik help \n".                                                
    "--------------------------------------------------------";
                                    $data = array('chatId'=>$chatId,'body'=>$text2);
                                    $this->sendRequest('message',$data);
    }
}
    
    public function grab_order($chatId_pengirim){
        // public function grab($chatId_pengirim,$input1,$input2){
        $kontak_pengirim =str_replace('@c.us','',$chatId_pengirim);
        
        //Kode Grab aktif                                
        require_once 'kode_grab.php';
        require_once 'users.php';
        require_once 'order_grab.php';
        $grab = new kode_grab();
        $users = new users();
        $order_grab = new order_grab();
        $res = $grab->view_aktif();
        $kode_grab =$res[0]['kode_grab'];
        $expired =$res[0]['expired'];
        $id_kode_grab =$res[0]['id'];
        
        $res2 = $users->get_users($kontak_pengirim);
        $nama_pengirim =$res2['nama'];
        $level_pengirim =$res2['level'];
        $kelompok_pengirim =$res2['kelompok'];
        //dev 28072019
        // -----------------------------------------------------KODING KIRIM REPORT KE KETUA KETIKA REQUEST
        // if($level_pengirim==1){
        // // jika level pemimpin akan dikirim ke pemimpin sup
        //     $res1 = $users->get_pemimpin_sup();
        //     $kontak_pemimpin =$res1[0]['kontak'];
        //     $nama_pemimpin =$res1[0]['nama'];
        //     $kelompok =$res1[0]['kelompok'];  
            
        // }else{
        //     $res1 = $users->get_pemimpin($kontak_pengirim);
        //     $kontak_pemimpin =$res1[0]['kontak'];
        //     $nama_pemimpin =$res1[0]['nama'];
        //     $kelompok =$res1[0]['kelompok'];  
        // }
        // -----------------------------------------------------END KODING KIRIM REPORT KE KETUA KETIKA REQUEST
    $chatId_pemimpin=$kontak_pemimpin.'@c.us';    
    // // $nomer_tujuan_pemesan=$no_kontak_pemesan.'@c.us'; 
    //CEK VOCHER YG TIDAK TERPAKAI
$cek = $order_grab->cek_belum_terpakai($kontak_pengirim);
$belum_terpakai = $cek[0]['belum_terpakai'];
$detail_kode_grab = $order_grab->detail_belum_terpakai($kontak_pengirim);
// $belum_terpakai = $cek[0]['kode_grab'];
    
//if($belum_terpakai>5){}else{}
    // PROSES ORDER
    
    
    
    if($belum_terpakai>=5){
      
//pesan ke pengirim 
$this->sendMessage($chatId_pengirim,
"-------------------------------------------------\n".
"Silahkan gunakan voucher yang belum terpakai \n".
"Request By     :".$nama_pengirim."  \n".
"Kelompok       :".$kelompok_pengirim."  \n".
"Divisi              :".$res2['divisi']."  \n".
"ðŸŽï¸ðŸŽï¸ðŸŽï¸ðŸŽï¸ðŸŽï¸ðŸŽï¸ðŸŽï¸\n".
"----------------------------------------------------"
);
    foreach($detail_kode_grab as $data){
        $this->sendMessage($chatId_pengirim,   
        $data['kode_grab']
    );            
    }
    
        
    }else{
$res3 = $order_grab->insert($kontak_pengirim,$kontak_pemimpin,$id_kode_grab);        
// PROSES UPDATE kode_grab
$res4 = $grab->update($id_kode_grab);
//pesan ke pengirim 
$this->sendMessage($chatId_pengirim,
"-------------------------------------------------\n".
"Request By    :".$nama_pengirim."  \n".
// "Nama           :".$nama_pengirim."  \n".
"Kelompok       :".$kelompok_pengirim."  \n".
"Divisi         :".$res2['divisi']."  \n".
"ðŸŽï¸ðŸŽï¸ðŸŽï¸ðŸŽï¸ðŸŽï¸ðŸŽï¸ðŸŽï¸\n".
"----------------------------------------------------"
);
//kirim kode yang udah diorder
    foreach($detail_kode_grab as $data){
        $this->sendMessage($chatId_pengirim,   
        $data['kode_grab']
    );            
    }
    $this->sendMessage($chatId_pengirim,
    $kode_grab);    
    $this->sendMessage($chatId_pemimpin,
    "-------------------------------------------------\n".
    "Request By    :".$kontak_pengirim."  \n".
    "Nama           :".$nama_pengirim."  \n".
    "Kelompok       :".$kelompok_pengirim."  \n".
    "ðŸŽï¸ðŸŽï¸ðŸŽï¸ðŸŽï¸ðŸŽï¸ðŸŽï¸ðŸŽï¸\n".
    "-------------------------------------------------- \n".
    "Kode Grab      :".$kode_grab."  \n".
    "----------------------------------------------------"
    );    
    
}
 }
//END GRAB ORDER DIVISI HLB-------------------------------
 public function grab_order_hlb($chatId_pengirim){
    // public function grab($chatId_pengirim,$input1,$input2){
    $kontak_pengirim =str_replace('@c.us','',$chatId_pengirim);
    
    //Kode Grab aktif                                
    require_once 'kode_grab.php';
    require_once 'users.php';
    require_once 'order_grab.php';
    $grab = new kode_grab();
    $users = new users();
    $order_grab = new order_grab();
    $res = $grab->view_aktif_hlb();
    $kode_grab =$res[0]['kode_grab'];
    $expired =$res[0]['expired'];
    $id_kode_grab =$res[0]['id'];
    
    $res2 = $users->get_users($kontak_pengirim);
    $nama_pengirim =$res2['nama'];
    $level_pengirim =$res2['level'];
    $kelompok_pengirim =$res2['kelompok'];
    //dev 28072019
    // -----------------------------------------------------KODING KIRIM REPORT KE KETUA KETIKA REQUEST
    // if($level_pengirim==1){
    // // jika level pemimpin akan dikirim ke pemimpin sup
    //     $res1 = $users->get_pemimpin_sup();
    //     $kontak_pemimpin =$res1[0]['kontak'];
    //     $nama_pemimpin =$res1[0]['nama'];
    //     $kelompok =$res1[0]['kelompok'];  
        
    // }else{
    //     $res1 = $users->get_pemimpin($kontak_pengirim);
    //     $kontak_pemimpin =$res1[0]['kontak'];
    //     $nama_pemimpin =$res1[0]['nama'];
    //     $kelompok =$res1[0]['kelompok'];  
    // }
    // -----------------------------------------------------END KODING KIRIM REPORT KE KETUA KETIKA REQUEST
$chatId_pemimpin=$kontak_pemimpin.'@c.us';    
// // $nomer_tujuan_pemesan=$no_kontak_pemesan.'@c.us'; 
//CEK VOCHER YG TIDAK TERPAKAI
$cek = $order_grab->cek_belum_terpakai($kontak_pengirim);
$belum_terpakai = $cek[0]['belum_terpakai'];
$detail_kode_grab = $order_grab->detail_belum_terpakai($kontak_pengirim);
// $belum_terpakai = $cek[0]['kode_grab'];

//if($belum_terpakai>5){}else{}
// PROSES ORDER



if($belum_terpakai>=5){
      
    //pesan ke pengirim 
    $this->sendMessage($chatId_pengirim,
    "-------------------------------------------------\n".
    "Silahkan gunakan voucher yang belum terpakai \n".
    "Request By     :".$nama_pengirim."  \n".
    "Kelompok       :".$kelompok_pengirim."  \n".
    "Divisi              :".$res2['divisi']."  \n".
    "ðŸŽï¸ðŸŽï¸ðŸŽï¸ðŸŽï¸ðŸŽï¸ðŸŽï¸ðŸŽï¸\n".
    "----------------------------------------------------"
    );
        foreach($detail_kode_grab as $data){
            $this->sendMessage($chatId_pengirim,   
            $data['kode_grab']
        );            
        }
        
            
        }else{
    $res3 = $order_grab->insert($kontak_pengirim,$kontak_pemimpin,$id_kode_grab);        
    // PROSES UPDATE kode_grab
    $res4 = $grab->update($id_kode_grab);
    //pesan ke pengirim 
    $this->sendMessage($chatId_pengirim,
    "-------------------------------------------------\n".
    "Request By    :".$nama_pengirim."  \n".
    // "Nama           :".$nama_pengirim."  \n".
    "Kelompok       :".$kelompok_pengirim."  \n".
    "Divisi         :".$res2['divisi']."  \n".
    "ðŸŽï¸ðŸŽï¸ðŸŽï¸ðŸŽï¸ðŸŽï¸ðŸŽï¸ðŸŽï¸\n".
    "----------------------------------------------------"
    );
    //kirim kode yang udah diorder
        foreach($detail_kode_grab as $data){
            $this->sendMessage($chatId_pengirim,   
            $data['kode_grab']
        );            
        }
        $this->sendMessage($chatId_pengirim,
        $kode_grab);    
        $this->sendMessage($chatId_pemimpin,
        "-------------------------------------------------\n".
        "Request By    :".$kontak_pengirim."  \n".
        "Nama           :".$nama_pengirim."  \n".
        "Kelompok       :".$kelompok_pengirim."  \n".
        "ðŸŽï¸ðŸŽï¸ðŸŽï¸ðŸŽï¸ðŸŽï¸ðŸŽï¸ðŸŽï¸\n".
        "-------------------------------------------------- \n".
        "Kode Grab      :".$kode_grab."  \n".
        "----------------------------------------------------"
        );    
        
    }
}
//END GRAB ORDER DIVISI HLB------------------------------- 

//END GRAB ORDER DIVISI MCM-------------------------------
public function grab_order_mcm($chatId_pengirim){
   // public function grab($chatId_pengirim,$input1,$input2){
   $kontak_pengirim =str_replace('@c.us','',$chatId_pengirim);
   
   //Kode Grab aktif                                
   require_once 'kode_grab.php';
   require_once 'users.php';
   require_once 'order_grab.php';
   $grab = new kode_grab();
   $users = new users();
   $order_grab = new order_grab();
   $res = $grab->view_aktif_mcm();
   $kode_grab =$res[0]['kode_grab'];
   $expired =$res[0]['expired'];
   $id_kode_grab =$res[0]['id'];
   
   $res2 = $users->get_users($kontak_pengirim);
   $nama_pengirim =$res2['nama'];
   $level_pengirim =$res2['level'];
   $kelompok_pengirim =$res2['kelompok'];
   //dev 28072019
   // -----------------------------------------------------KODING KIRIM REPORT KE KETUA KETIKA REQUEST
   // if($level_pengirim==1){
   // // jika level pemimpin akan dikirim ke pemimpin sup
   //     $res1 = $users->get_pemimpin_sup();
   //     $kontak_pemimpin =$res1[0]['kontak'];
   //     $nama_pemimpin =$res1[0]['nama'];
   //     $kelompok =$res1[0]['kelompok'];  
       
   // }else{
   //     $res1 = $users->get_pemimpin($kontak_pengirim);
   //     $kontak_pemimpin =$res1[0]['kontak'];
   //     $nama_pemimpin =$res1[0]['nama'];
   //     $kelompok =$res1[0]['kelompok'];  
   // }
   // -----------------------------------------------------END KODING KIRIM REPORT KE KETUA KETIKA REQUEST
$chatId_pemimpin=$kontak_pemimpin.'@c.us';    
// // $nomer_tujuan_pemesan=$no_kontak_pemesan.'@c.us'; 
//CEK VOCHER YG TIDAK TERPAKAI
$cek = $order_grab->cek_belum_terpakai($kontak_pengirim);
$belum_terpakai = $cek[0]['belum_terpakai'];
$detail_kode_grab = $order_grab->detail_belum_terpakai($kontak_pengirim);
// $belum_terpakai = $cek[0]['kode_grab'];

//if($belum_terpakai>5){}else{}
// PROSES ORDER



if($belum_terpakai>=5){
     
   //pesan ke pengirim 
   $this->sendMessage($chatId_pengirim,
   "-------------------------------------------------\n".
   "Silahkan gunakan voucher yang belum terpakai \n".
   "Request By     :".$nama_pengirim."  \n".
   "Kelompok       :".$kelompok_pengirim."  \n".
   "Divisi              :".$res2['divisi']."  \n".
   "ðŸŽï¸ðŸŽï¸ðŸŽï¸ðŸŽï¸ðŸŽï¸ðŸŽï¸ðŸŽï¸\n".
   "----------------------------------------------------"
   );
       foreach($detail_kode_grab as $data){
           $this->sendMessage($chatId_pengirim,   
           $data['kode_grab']
       );            
       }
       
           
       }else{
   $res3 = $order_grab->insert($kontak_pengirim,$kontak_pemimpin,$id_kode_grab);        
   // PROSES UPDATE kode_grab
   $res4 = $grab->update($id_kode_grab);
   //pesan ke pengirim 
   $this->sendMessage($chatId_pengirim,
   "-------------------------------------------------\n".
   "Request By    :".$nama_pengirim."  \n".
   // "Nama           :".$nama_pengirim."  \n".
   "Kelompok       :".$kelompok_pengirim."  \n".
   "Divisi         :".$res2['divisi']."  \n".
   "ðŸŽï¸ðŸŽï¸ðŸŽï¸ðŸŽï¸ðŸŽï¸ðŸŽï¸ðŸŽï¸\n".
   "----------------------------------------------------"
   );
   //kirim kode yang udah diorder
       foreach($detail_kode_grab as $data){
           $this->sendMessage($chatId_pengirim,   
           $data['kode_grab']
       );            
       }
       $this->sendMessage($chatId_pengirim,
       $kode_grab);    
       $this->sendMessage($chatId_pemimpin,
       "-------------------------------------------------\n".
       "Request By    :".$kontak_pengirim."  \n".
       "Nama           :".$nama_pengirim."  \n".
       "Kelompok       :".$kelompok_pengirim."  \n".
       "ðŸŽï¸ðŸŽï¸ðŸŽï¸ðŸŽï¸ðŸŽï¸ðŸŽï¸ðŸŽï¸\n".
       "-------------------------------------------------- \n".
       "Kode Grab      :".$kode_grab."  \n".
       "----------------------------------------------------"
       );    
       
   }
}
//END GRAB ORDER DIVISI MCM------------------------------- 




   public function cek_stok($chatId){
      require_once 'kode_grab.php';
      $kode_grab = new kode_grab();
      $res5 = $kode_grab->view_stok();
      $stok=$res5[0]['stok'];
      $this->sendMessage($chatId,

      "------STOK KODE GRAB------------------------\n".
      "ðŸ·ï¸ STOK   :".$stok."  \n".
      "----------------------------------------------"
      );
   }
   public function cek_stok_hlb($chatId){
       
       require_once 'kode_grab.php';
       $kode_grab = new kode_grab();
       $res5 = $kode_grab->view_stok_hlb();
       $stok=$res5[0]['stok'];
       $this->sendMessage($chatId,
   
       "------STOK KODE GRAB------------------------\n".
       "ðŸ·ï¸ STOK   :".$stok."  \n".
       "----------------------------------------------"
       );
   }
   public function cek_stok_mcm($chatId){
       
       require_once 'kode_grab.php';
       $kode_grab = new kode_grab();
       $res5 = $kode_grab->view_stok_mcm();
       $stok=$res5[0]['stok'];
       $this->sendMessage($chatId,
   
       "------STOK KODE GRAB------------------------\n".
       "ðŸ·ï¸ STOK   :".$stok."  \n".
       "----------------------------------------------"
       );
   }
//dev 0208019 grab report
public function grab_report($chatId){
        
// dev 0208019 kirim file
require_once 'kirim_file.php';
$kirim_file = new kirim_file();
$no_kontak=str_replace('@c.us','',$chatId);
// $no_kontak='6287711086938';
$res = $kirim_file->report($no_kontak);
    
    }
//dev 03092019
public function grab_info_tim($chatId){
        
    require_once 'order_grab.php';
    $order_grab = new order_grab();
    require_once 'users.php';
    $users = new users();
    $kontak_pemimpin=str_replace('@c.us','',$chatId);
    // $no_kontak='62816204646';
    // $no_kontak='6287711086938';
    // $result = $order_grab->get_order_grab($no_kontak);
    // $jumlah=$result['jumlah'];
    
    $res = $users->get_detail($kontak_pemimpin);
    
    
    $nama=$res[0]['nama'];
    $kelompok=$res[0]['kelompok'];
    $level=$res[0]['level'];
    
    $grab_info_tim = $order_grab->grab_info_tim($kelompok);
    if($level==1){
//==========
foreach($grab_info_tim as $data):
    $text = 
    // "Anda Terdaftar dalam kelompok ".strtoupper($kelompok)." \n".
    "--------------------------------------------------------\n".
    "Grab Info TIM ".$kelompok." \n".
    "--------------------------------------------------------\n".
    // $looping1.
    "ðŸ˜Ž Nama           : ".$data["nama"]."\n".
    "ðŸ“ž Kontak      : ".$data["no_pemesan"]."\n".
    "ðŸ·ï¸ jumlah Voucher : ".$data["jumlah"]."\n". 
    "ðŸ’° Total          : Rp. ".number_format(str_replace(".00","",$data["total_fare"]))."\n".
    "ðŸ“… Bulan          : ".$data["bulan"]."\n". 
    // "\n".
    // "Kode Voucher : ".$data["Trip_Code"]."\n". 
    // "\n".
    // "Pick Up : ".$data["Pick_Up"]."\n". 
    // "( ".$data["Pickup_Date"]." )\n".
    // "\n".
    // "Drop Off: ".$data["Drop_Off"]."\n". 
    // "( ".$data["Dropoff_Date"]." )\n". 
    // "\n". 
    // "Total ðŸ’³   : Rp. ".number_format(str_replace(".00","",$data["fare"]))."\n".
    // // "--------------------------------------------------------"."\n";
    
    // "--------------------------------------------------------\n".                                       
    // "Butuh bantuan? --> ketik help \n".                                                
    // "Ditanya aja Mas.. \n".                                                
    "--------------------------------------------------------"
    ;
       $this->sendMessage($chatId,$text);
    // $chat_api->sendMessage($kontak_pemimpin,$text);
    endforeach;
//=========        
        // $this->sendMessage($chatId,
    
        // "ðŸ“‹ðŸ“‹ðŸ“‹ðŸ“‹ðŸ“‹ðŸ“‹ðŸ“‹ðŸ“‹ðŸ“‹ðŸ“‹ðŸ“‹ðŸ“‹ðŸ“‹\n".
        // // "Nama       :".$nama."  \n".
        // // "Kontak     :".$no_kontak."  \n".
        // "INFO Voucher Grab ".$kelompok."  \n".    
        // "----------------------------------------------"
        // );
    
    }else{
        $this->sendMessage($chatId,ðŸ˜ðŸ˜ðŸ˜ðŸ˜ðŸ˜ðŸ˜ðŸ˜ðŸ˜);
    
        
    }
    
}
    //dev 28072019
    public function grab_info($chatId){
        
        require_once 'order_grab.php';
        $order_grab = new order_grab();
        require_once 'users.php';
        $users = new users();
        $no_kontak=str_replace('@c.us','',$chatId);
        // $no_kontak='62816204646';
        // $no_kontak='6287711086938';
        // $result = $order_grab->get_order_grab($no_kontak);
        // $jumlah=$result['jumlah'];
        
        $res = $users->get_detail($no_kontak);
        
        
        $nama=$res[0]['nama'];
        $kelompok=$res[0]['kelompok'];
        $level=$res[0]['level'];
        
        
        // $result = $order_grab->report_ymd($no_kontak,$kelompok,$level);
        // $count_ytd = $result[0]['COUNT_YTD'];
        // $total_ytd = $result[0]['TOTAL_YTD'];
        // print_r($result);die();
        
        // $sudah_detail = $order_grab->sudah_terpakai_detail($no_kontak);
        // $belum_detail = $order_grab->belum_terpakai_detail($no_kontak);
        
        // print_r($sudah_detail);die();
        
        // $jumlah_belum = $order_grab->belum_terpakai($no_kontak);
        // $jumlah_belum = $jumlah_belum[0]['jumlah'];
        
        $this->sendMessage($chatId,
        
        "------INFO Voucher Grab------------------------\n".
        "Nama           : ".$nama."  \n".
        "Kontak         : ".$no_kontak."  \n".
        "Kelompok    : ".$kelompok."  \n".
        "Divisi            : ".$res[0]['divisi']."  \n".
        // "----------------------------------------------\n".
        // "Jumlah Terpakai    : ".$count_ytd."  \n".
        // "----------------------------------------------\n".
        // "Total Pemakainan   : ".$total_ytd."  \n".
        // "Total Pemakainan   : Rp. ".number_format(str_replace(".00","",$total_ytd))."\n".        
        // "----------------------------------------------\n".
        // "Jumlah Belum Terpakai   : ".$jumlah_belum."  \n".
        // "----------------------------------------------\n".
        // "Jumlah Sudah Terpakai   :".$jumlah_sudah."  \n".
        // "Jumlah Belum Terpakai   :".$jumlah_belum."  \n".
        "----------------------------------------------"
        );
//---------
// $detail_kode_grab = $order_grab->detail_belum_terpakai($no_kontak);
//pesan ke pengirim 
// $this->sendMessage($chatId,
// "-------------------------------------------------\n".
// "Request By    :".$nama."  \n".
// "Kelompok      :".$kelompok."  \n".
// "----------------------------------------------------"
// );
    // foreach($detail_kode_grab as $data){
    //     $this->sendMessage($chatId,   
    //     $data['kode_grab']
    // );            
    // }
//-----------
 }
                                  
    public function insert_users($chatId,$input1,$input2,$input3,$input4){
     
         if($input4==1){
             $level=1;
         }else{
             $level=2;
         }
     require_once 'users.php';
     $users = new users();
     $no_kontak=str_replace('@c.us','',$chatId);
     // dev26072019                        
     // $res5 = $users->insert(strtoupper($input2),$no_kontak,strtoupper($input3));
     $res5 = $users->get_users($no_kontak);
     $ada_kontak = count($res5['kontak']);
     $res6 = $users->get_kelompok(strtoupper($input3));
     $ada_kelompok = count($res6['kelompok']);
     
     if($ada_kontak>0){
         
         $proses = "KONTAK SUDAH TERDAFTAR \n";
         // $proses = ($ada_kontak==0) ? "KONTAK BELUM TERDAFTAR \n" : "KONTAK SUDAH TERDAFTAR \n";
         
     }elseif($ada_kelompok==0 && $level==2){
         $proses =  "NAMA KELOMPOK SALAH \n";
         // $proses = ($ada_kelompok==0) ? "KELOMPOK BELUM TERDAFTAR \n" : "KELOMPOK SUDAH TERDAFTAR \n";
     }else{
         //insert(NAMA,NO_KONTAK,NAMA_KELOMPOK,LEVEL);
         $res7 = $users->insert(strtoupper($input2),$no_kontak,strtoupper($input3),$level);
         $proses = ($res7=false) ? "GAGAL \n" : "SUCCESS \n";
         
     }                        
         $this->sendMessage($chatId,
     
         // "------------------------------------------------\n".
         "==>>>>".$proses."  \n".
         "Anda Terdaftar Dalam Kelompok ".strtoupper($input3)."  \n".
         // "------".$input3."  \n".
         // "------".$input4."  \n".
         // "------".$input5."  \n".
         // "------- \n".
         "-----------------------------------------------------"
         );
    //dev
    $res1 = $users->get_pemimpin($no_kontak);
    $kontak_pemimpin =$res1[0]['kontak'];
    // $nama_pemimpin =$res1[0]['nama'];
    $kelompok =$res1[0]['kelompok']; 
    $chatId_pemimpin=$kontak_pemimpin.'@c.us';   
    $this->sendMessage($chatId_pemimpin,
                                
    "-----------NEW REGISTER--------------------------------------\n".
    "No Kontak      :".$no_kontak."  \n".
    "Nama           :".$input2."  \n".
    "Kelompok       :".$input3."  \n".
    // "No Pemimpin    :".$kontak_pemimpin."  \n".
    // "Nama Pemimpin  :".$nama_pemimpin."  \n".
    // "-------------------------------------------------- \n".
    // "Kode Grab      :".$kode_grab."  \n".
    // "Expired        :".$expired."  \n".
    // "QTY      :".$input3."  \n".
    // "".$id_kode_grab."  \n".
    "----------------------------------------------------"
    );
    //==========
}
//dev 28072019
//jika pemimpin       --> UPDATE  NAMA KONTAK KELOMPOK LEVEL WHERE_KOTAK
//jika bukan pemimpin --> UPDATE  NAMA KONTAK KELOMPOK 
public function update_users($chatId,$input1,$nama_update,$kontak_update,$kelompok_update,$level,$where_kontak){
    $kontak_pengirim =str_replace('@c.us','',$chatId);
    require_once 'users.php';
    $users = new users();
    $res2 = $users->get_users($kontak_pengirim);
    // $nama_pengirim =$res2['nama'];
    $level_user =$res2['level'];    
//cek level kontak
// jika level 1  level=1 else level=2
// $level_user=2;   
if($level_user==1){
    $level_update=$level;
    $where_kontak_update=$where_kontak;
}else{
    $level_update=2;
    $where_kontak_update=str_replace('@c.us','',$chatId);
}
$result = $users->update($nama_update,$kontak_update,$kelompok_update,$level_update,$where_kontak_update);
if($result){
    $this->sendMessage($chatId,
    "--------------------------------------------------------\n".                                       
    "--------------------------------------------------------\n".                                       
    "    ".$chatId." \n".
    "UPDATE    ".$input1." \n".
    // "SET ".$input3." \n".
    "NAMA    ".$nama_update." \n".
    "KONTAK    ".$kontak_update." \n".
    "KELOMPOK    ".$kelompok_update." \n".
    "LEVEL   ".$level_update." \n".
    "NO_KONTAK_UPDATE    ".$where_kontak_update." \n".
    "--------------------------------------------------------"
    );
    
}else{
    $this->sendMessage($chatId,
    "--------------------------------------------------------\n".                                       
    "GAGAL UPDATE     \n".
    "--------------------------------------------------------"
    );
}
    
    }
    public function update_pemimpin($chatId_pemimpin_lama,$input1,$input2,$no_kontak_pemimpin_baru){
            
        $no_kontak_pemimpin_lama=str_replace('@c.us','',$chatId_pemimpin_lama);
        // $no_kontak_pemimpin_baru=$input3;
        $chatId_pemimpin_baru=$no_kontak_pemimpin_baru.'@c.us'; 
        require_once 'users.php';
        $users = new users();
        $users->update_pemimpin($no_kontak_pemimpin_lama,$no_kontak_pemimpin_baru);
        //kirim ke pemimpin lama
        $this->sendMessage($chatId_pemimpin_lama,
        "--------------------------------------------------------\n".                                      
        "DATA PEMIMPIN KELOMPOK TERUPDATE  \n".
        "Request By    :".$no_kontak_pemimpin_lama."  \n". 
        "--------------------------------------------------------"
        );
        //kirim ke pemimpin lama
        $this->sendMessage($chatId_pemimpin_baru,
        "--------------------------------------------------------\n".                                       
        "DATA PEMIMPIN KELOMPOK TERUPDATE  \n".
        "Request By    :".$no_kontak_pemimpin_lama."  \n". 
        "--------------------------------------------------------"
        );
        
        }    
        public function update_kelompok($chatId,$input1,$input2,$kelompok_baru){
            
            $no_kontak=str_replace('@c.us','',$chatId);
            // $kelompok_baru=$input2;
            require_once 'users.php';
            $users = new users();
            $users->update_kelompok($no_kontak,strtoupper($kelompok_baru));
            //kirim ke pemimpin lama
            $this->sendMessage($chatId,
            "--------------------------------------------------------\n".                                      
            "DATA TERUPDATE  \n".
            "Anda terdaftar dalam kelompok :".strtoupper($kelompok_baru)."  \n". 
            "--------------------------------------------------------"
        );
        
        // $result2 = $users->get_detail_pemimpin_kelompok($kelompok_baru);
        // $no_kontak_pemimpin_baru=$result2[0]['kontak'];
        // $chatId_pemimpin_baru=$no_kontak_pemimpin_baru.'@c.us'; 
        
            // //kirim ke pemimpin baru
            // $this->sendMessage($chatId_pemimpin_baru,
            // "--------------------------------------------------------\n".                                       
            // "DATA  KELOMPOK BARU TERUPDATE  \n".
            // "Request By    :".$no_kontak_pemimpin_lama."  \n". 
            // "--------------------------------------------------------"
            // );
            
    
            }   
// =====================================================================================
// =====================================================================================
                        public function sendMessage($chatId, $text){
                              
                                $data = array('chatId'=>$chatId,'body'=>$text);
                                $this->sendRequest('message',$data);
                    
                        }
                        public function sendRequest($method,$data){
                        $url = $this->APIurl.$method.'?token='.$this->token;
                        if(is_array($data)){ $data = json_encode($data);}
                        $options = stream_context_create(['http' => [
                        'method'  => 'POST',
                        'header'  => 'Content-type: application/json',
                        'content' => $data]]);
                        $response = file_get_contents($url,false,$options);
                        file_put_contents('requests.log',$response.PHP_EOL,FILE_APPEND);}
                        public function hook_now($chatId){
                            // public function webhook($webhookUrl){
                            $webhookUrl = "http://" . $_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].'/chatbotwa-webhook/index.php';                           
                            // $webhookUrl = "http://35.226.76.184:1111/chatbotwa-webhook/webhook.php";
                    // print_r($webhookUrl);die();        
                            // $data = array('webhookUrl'=>$webhookUrl);
                            // $this->sendRequest('webhook',$data);
                            // print_r('webhook_dimas running on --->> '.$webhookUrl);
                            
                            $text = 
                            // "Anda Terdaftar dalam kelompok ".strtoupper($kelompok)." \n".
                            "--------------------------------------------------------\n".
                            // $looping1.
                            "Webhook    : ".$webhookUrl."\n".
                            // "Tujuan : ".$data["Trip_Description"]."\n". 
                            "--------------------------------------------------------"
                            ;
                            $data2 = array('chatId'=>$chatId,'body'=>$text);
                            $this->sendRequest('message',$data2);                            
                        }
                        public function hook_dev($chatId){
                            // public function webhook($webhookUrl){
                            // $webhookUrl = "http://" . $_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].'/chatbotwa-webhook/index.php';                           
                            $webhookUrl = "http://35.226.76.184:1111/chatbotwa-webhook/webhook.php";
                    // print_r($webhookUrl);die();        
                            $data = array('webhookUrl'=>$webhookUrl);
                            $this->sendRequest('webhook',$data);
                            // print_r('webhook_dimas running on --->> '.$webhookUrl);
                            
                            $text = 
                            // "Anda Terdaftar dalam kelompok ".strtoupper($kelompok)." \n".
                            "--------------------------------------------------------\n".
                            // $looping1.
                            "Webhook    : ".$webhookUrl."\n".
                            // "Tujuan : ".$data["Trip_Description"]."\n". 
                            "--------------------------------------------------------"
                            ;
                            $data2 = array('chatId'=>$chatId,'body'=>$text);
                            $this->sendRequest('message',$data2);                            
                        }
                        public function hook_prod($chatId){
                            // public function webhook($webhookUrl){
                            // $webhookUrl = "http://" . $_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].'/chatbotwa-webhook/index.php';                           
                            $webhookUrl = "http://35.193.110.18/chatbotwa-webhook/webhook.php";                                
                            $data = array('webhookUrl'=>$webhookUrl);
                            $this->sendRequest('webhook',$data);
                            // print_r('webhook_dimas running on --->> '.$webhookUrl);
                            
                            $text = 
                            // "Anda Terdaftar dalam kelompok ".strtoupper($kelompok)." \n".
                            "--------------------------------------------------------\n".
                            // $looping1.
                            "Webhook    : ".$webhookUrl."\n".
                            // "Tujuan : ".$data["Trip_Description"]."\n". 
                            "--------------------------------------------------------"
                            ;
                            $data2 = array('chatId'=>$chatId,'body'=>$text);
                            $this->sendRequest('message',$data2);                            
                        }                        
                        // public function hook($chatId,$ip,$port){
                        //     // public function webhook($webhookUrl){
                        //         // $webhookUrl = "http://" .$ip.':'.$port.'/chatbotwa-webhook/index.php';                           
                        //         $webhookUrl = "http://35.193.110.18/chatbotwa-webhook/webhook.php';                           
                                 
                        //     $data = array('webhookUrl'=>$webhookUrl);
                        //     $this->sendRequest('webhook',$data);
                       
                            
                        //     $text = 
                    
                        //     "--------------------------------------------------------\n".
                        //     // $looping1.
                        //     "Switch webhook to    : ".$webhookUrl."\n".
                        //     // "Tujuan : ".$data["Trip_Description"]."\n". 
                        //     "--------------------------------------------------------"
                        //     ;
                        //     $data2 = array('chatId'=>$chatId,'body'=>$text);
                        //     $this->sendRequest('message',$data2);                            
                        // }
                    }
                        //execute the class when this file is requested by the instance
                       $whatsAppBot =  new whatsAppBot();
                        $webhookUrl = "http://" . $_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].'/chatbotwa-webhook/index.php'; 
                        print_r('webhook_dimas running on --->> '.$webhookUrl);                         
?>