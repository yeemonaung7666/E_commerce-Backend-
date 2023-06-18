<?php 
    $url= url()->current();
    $home_url='http://127.0.0.1:8000/home';
    $item_url='http://127.0.0.1:8000/Admin/item';
    $category_url = 'http://127.0.0.1:8000/Admin/category';
    $addItem_url = 'http://127.0.0.1:8000/Admin/addItem';
    $addCat_url='http://127.0.0.1:8000/Admin/addCategory';
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- bootstrap cdn link --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    {{-- tostar  CDN Link --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toaster/4.0.1/css/bootstrap-toaster.css" integrity="sha512-BqX9iUcQY8V8QeSbSjk/vL2CQk8TT5SEp8OeuRO6MMSYfRtVE0DW4eqjmD7Iew2XAoa+iEXIkJQPYXaP0FqWrA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ url('css/adminDashboard.css') }}">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>



</head>
<body id="body-pd">    
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bi bi-list' id="header-toggle"></i> 
        <a href="#" class="nav_title">
            <img src="{{ url('images/logo.jpg') }}" alt="">
             Admin Panel </a> </div>
        <div class="header_name"> {{ Auth::User()->name }} </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div class="nav_list"> 
                <a href="" class="nav_link"></a>

                <a href="{{ url('Admin/item') }}" class="nav_link <?php if($url==$item_url OR $url==$addItem_url OR $url==$home_url){ echo 'active';}?>" id="item" onclick="active()">
                     <i class='bi bi-grid-fill'></i> <span class="nav_name">Item</span> </a> 
                <a href="{{ url('Admin/category') }}" class="nav_link <?php if($url==$category_url OR $url==$addCat_url){ echo 'active';}?> " id="category">
                     <i class='bi bi-hdd-stack'></i> <span class="nav_name">Category</span> </a> 
                
            </div>
            <a href="{{ route('logout') }}"  onclick="event.preventDefault();
                document.getElementById('logout-form').submit();" class="nav_link logout_button">
                    <i class='bi bi-box-arrow-in-left'></i> 
                    <span class="nav_name">SignOut</span> 
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
            </form>
        </nav>
    </div

    <!--Container Main start-->
    <div class="height-100 bg-light">
        @yield('dashboard')

        
    </div>
    

    <!--Container Main end-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toaster/4.0.1/js/bootstrap-toaster.js" integrity="sha512-4JwsWzz1l6JIsCUPi1bopU+79qHRCUlOJhYapg5dRuXjFFgXPazVnoOgrvrUMckjJl6LPOM4GncDv3ilou8avQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <script src="{{ asset('js/home.js') }}"></script>
    
    
</body>
</html>

