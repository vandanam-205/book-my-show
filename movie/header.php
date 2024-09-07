
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        .im{
            height: 70px;
            width: 150px;
            margin-left: 130px;
            
        }
        .in{
            height: 30px;
            width:600px;
           margin-top: 20px;
            font-size:15px;
            border: 1px solid rgba(219, 218, 218, 0.736);
            border-radius: 3px;
            padding-left: 10px;
            border-left: none;
           
       
        }
   
        .first{
            display: flex;
        }
        .se{
            height: 30px;
            margin:20px;
          text-decoration: none; 
            border-color:rgba(255, 255, 255, 0.942);
            width: 100px;
            font-size: medium;
            margin-left: 130px;

            
            
        }
        .se:hover{
          border: 2px solid black;
          border-radius: 3px;
          
        }
        .b{
          
            margin-top:22px;
            margin-left: 5px;
       
            width: 80px;
           border-radius: 5px;
           background-color: rgb(255, 5, 93);
           border-style: none;
           color: aliceblue;
           height: 28px;
        }
        .b:hover{
          border: 1.5px solid black;
          color:rgb(60, 60, 60);
        }
        .second{
            display: flex;
            margin-left: 150px;
        }
        .na{
            display: flex;
            background-color: rgb(255, 255, 255);
        }
        .h{
           background-color: rgba(241, 241, 241, 0.948);
           padding: 3px;
           text-decoration:aliceblue; 
           color: rgb(70, 69, 69);
           padding-left: 50px;
           font-size: 18px;
           height: 45px;
           display: flex;
           align-items: center;
          
            
        }
        .h:hover{
          color: rgb(231, 149, 149);
          text-decoration: none;
          font-size: 19px;
        }
        .na1{
            display: flex;
            background-color: rgba(241, 241, 241, 0.948);
             margin-top: 3px;
        }
        #a1
        {
            padding-left: 130px;
        }
        #a2{
            padding-left: 800px;
            font-size: 14px;
        }
        #a2:hover{
          color: rgb(231, 149, 149);
          text-decoration: none;
          font-size: 17px;}
        h1{
            font-size:xx-large ;
            font-style:arial;
            margin-left: 130px;
            margin-top: 10px;
        

        }
        .search{
            height:20px;
        
            margin-top: 20px;
            margin-left: 30px;
            border:1px solid black;
            border-top-left-radius: 3px;
            border-bottom-left-radius: 3px;
            padding: 5px;
          
            border-right: none;
            border-color: rgb(207, 211, 214);
           
        }
        .m1{
            height: 350px;
            margin: 15px;
            border-radius: 5px;
        }
        #m2{
            margin-left: 130px;
        }
        .bar{
            height: 35px;
            margin-top: 20px;
            margin-left: 10px;
        }
        .bar:hover{
          border: 2px solid rgb(22, 22, 22);
          border-radius: 5px;

        }
    </style>
</head>
<body>
<header> 
      
      <!--First-navbar-->

        <nav>

          <!--book my show image-->

       <div class="na">       
            <div class="first">
           <img src="picture/logo.jpg"  class="im" srcset="">

          <!--search-bar-->

           <img src="picture/searchlogo.jpg" class="search" >
           <input  type="text"  class="in" placeholder="Search for Movie,Event,Plays and Activities">
       </div>

          <!--Location-->

       <div class="second">
           <div class="op">
           <select class="se">
               <option value="">morbi..</option>
               <option value=""></option>
               <option value=""></option>
               <option value=""></option>
               <option value=""></option>
               <option value=""></option>
           </select>
           </div>

           <!--Sign -in button-->

           <div class="bu">
            <a href=" " target="_blank"><button class="b">Sign in</button></a>
           </div>

           <!--menubar-->

          <a href="" target="_blank"> <img src="picture/ba.jpg" alt="" class="bar"></a>
       </div>
   </div>

   </nav>

   <!--Second-navbar-->

   <nav>
    <div class="na1">
       <a href="" class="h" id="a1">Movie</a>
       <a href="" class="h">Stream</a>
       <a href="" class="h">Events</a>
       <a href="" class="h">plays</a>
       <a href="" class="h">Sports</a>
      <!-- <a href="" class="h"  >Activities</a> -->
       <a href="" class="h" id="a2" >GiftCards</a> 

    </div>
</nav>

  <!--main-image carousel-->

   </header>
</body>
</html>
