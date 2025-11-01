<style>
  *{
 margin: 0;
    padding: 0;
    box-sizing: border-box;
    
}

.img{
    
 background:url(../0.jpg);
  height: 100%;
    background-size: cover;
    background-position: center;
}
.img:after{
  position: absolute;
content: '';
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    background: rgba(0,0,0,0.7);
    
    
    
}

.content{
    position: absolute;
    top: 50%;
    left: 50%;
    text-align: center;
    padding: 60px  32px;
    width: 370px;
    background: rgba(255,255,255,0.04);
    box-shadow: -1px 4px 28px 0px rgba(0,0,0,0.75);
    z-index: 9;
    transform: translate(-50%,-50%)
    
}
.content h2{
   color: white;
    font-size: 33px;
    
    margin: 0 0 35px 0;
    

    
}
.filed{
 position: relative;
    height: 45px;
    width: 100%;
    display: flex;
    background: transparent;
    border: none;
   outline: none;
}
.filed input{
 height: 100%;
    width: 100%;
    color: #222;
    font-size: 16px;
    text-align: end;
    margin-right: 10px;
    background:flex;
    border: none;
   outline: none;
    
}
.space{
 margin-top: 16px;   
    
    
}

.show{
 position: absolute;
    left: 12px;
    font-size: 13px;
    color: #222;
    
    font-weight: 700;
    cursor: pointer;
    
}
.pass-key:void .show{
    
  display: block;  
}
.filed span{
  width: 40px;  
  line-height: 45px;  
}




.field1 button[type="submit"]{
 background: #4180ab;
    border: 8px solid #407ca5;
    color: white;
    font-size: 18px;
    cursor: pointer;
    font-weight: 600;
    
    
    
}
.field1 button[type="submit"]:hover{
    background: #3f7294;

}
.field1 button {
 height: 100%;
    width: 100%;
    border: none;
    outline: none;
    color: #222;
    margin-top: 30px;
    font-size: 16px;
    
    
} 

.signup{
  color: white;
    margin-top: 20px;
    
}
.signup a{
   color: #3498db;
  text-decoration: none;
    
}

.signup a:hover{
    
  text-decoration: underline;
}
.mycssquote{
	  color: white;
    background: flex;
    border:1px solid flex;
    padding: 5px;
    text-align: center;
    position: absolute;
    top: 532;
    left: 0;
    width: 100%;
    
}
</style>

<html >
  <head>
    <meta charset="utf-8">
    <title>login</title>
    <link rel="stylesheet" href="css/login.css">
  
  </head>
  <body>
<div class="img">
      
  <div class="content">
  <h2>تسجـــــــيل دخــــــول</h2>  <META HTTP-EQUIV=”Refresh” >
  <form action="login.php" method="post">
      <div class="filed">
        <input type="text" name="username" required placeholder="أدخل الاسم">
        
        </div>
      
        <div class="filed space">
        <input type="password" name="password" class="pass-key" required placeholder="كلمه المرور">
            <span class="show">  ظهور </span>
        
        </div>
      
      <div class="field1">
        <button type="submit" name="login">دخول</button>
    
        </div>
      
      
      </form>
    <div class="signup"> ليس لدي حساب
      <a href="signup.php"> تسجيل جديد</a>
      
      </div>

    </div>    

      </div>

    <script type="text/javascript" src="js/login.js" ></script>
  </body>
</html>


<?php
// استدعاء ملف الاتصال بقاعدة البيانات
require 'db.php';
// فتح جلسه
session_start();

// دالة الشرط للتحقق من ضغط زر login
if(isset($_POST['login'])){
	// تخزين الحقول فى متغيرات
	$user = $_POST['username'];
	$pass = $_POST['password'];
	
	// انشاء استعلام
	// فى هذا الاستعلام استخدمنا الشرط وجود اسم المستخدم وكلمة المرور
	$qu = "select * from users where username = '$user' && password = '$pass'";
	
	// ارسال الاستعلام والتحقق من وجود العضو
	if(mysqli_num_rows(mysqli_query($con, $qu)) > 0){
		// اذا تم وجود النتيجة يتم اضافة اسم العضو فى الجلسه 
		$_SESSION['username'] = $user;
		// ثم يتم الانتقال الى منطقة الاعضاء
		header("Location: index.html");
	} else { 
		// اذا لم يتم ايجاد اى قيمه 0
    echo "<p class=\"mycssquote\">كلمة السر او اسم المستخدم خطأ.</p>";
	}
	
	
}

?>