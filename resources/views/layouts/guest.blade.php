<!DOCTYPE html>
<html>
    <head>
        <link rel="preconnect" href="https://fonts.googleapis.com"> 
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,600;0,700;1,500;1,900&display=swap" rel="stylesheet">
        <link href="//db.onlinewebfonts.com/c/2d57f676e3d6955778fb8acac0176b9a?family=Eina01-Bold" rel="stylesheet" type="text/css"/>
        <link href="//db.onlinewebfonts.com/c/032d6b2c34344e22d2cbca6b7050d642?family=Eina01-SemiBold" rel="stylesheet" type="text/css"/>
        <style>
.container {
  display: grid; 
  min-width:100%;
  grid-template-columns: max-content max-content; 
  grid-template-rows: 100%; 
  height: 1331px;
  gap: 0px 0px; 
  margin:0;
  grid-template-areas: 
    "navbar content"; 
}

.header { 
    grid-area: header;
    min-width: 100%; 
    background-size: cover;
    background-image: url("/Image/header.png");
    background-repeat: no-repeat;
    display: flex;
    flex-direction: row;
    align-items: center;
    padding: 0px;

    }

.navbar { 
    grid-area: navbar;
    left: 0; 
}

.content { 
    grid-area: content;
    right: 0; 
    margin:0;
    justify-content:center;
}

.footer { 
    grid-area: footer; 
    background-size: cover;
    background-image: url("/Image/footer.png");
    background-repeat: no-repeat;
    min-width:100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: flex-start;
}

            body {
               margin: 0;
                min-width:max-content;
                min-height:100%;
                display: grid; 
                grid-template-columns: 100%; 
                grid-template-rows: max-content max-content 46px; 
                gap: 0px 0px; 
                grid-template-areas: 
                    "header"
                    "container"
                    "footer"; 
            }
            .frame9396-frame9274 {
            
            display: flex;
            align-self: flex-start;
            box-sizing: border-box;
            border-color: transparent;
            border-radius: 0px 0px 0px 0px;
            padding: 35px 90px 34px 88px;
            min-width:100%;
            gap:34px;
            }
            .frame9396-logo1 {
            width: 251px;
            height: 137px;
            position: relative;
            box-sizing: border-box;
            border-color: transparent;
            margin-bottom: 0;
            }
            .frame9396-frame9273 {
            display: flex;
            position: relative;
            box-sizing: border-box;
            align-items: center;
            border-color: transparent;
            margin-right: 0;
            border-radius: 0px 0px 0px 0px;
            margin-bottom: 0;
            flex-direction: column;
            }
            .header-text {
            color: #FFFFFF;
            width: 975px;
            height: auto;
            font-size: 40px;
            align-self: auto;
            font-style: SemiBold;
            text-align: center;
            font-family: Poppins;
            font-weight: 600;
            line-height: 116.99999570846558%;
            font-stretch: normal;
            margin-right: 0;
            margin-bottom: 9px;
            text-decoration: none;
            }
            .frame9396-line9 {
            width: 741px;
            height: 0px;
            opacity: 0.50;
            position: relative;
            box-sizing: border-box;
            margin-right: 0;
            margin-bottom: 9px;
            }
            .frame9396-text2 {
            color: #FFFFFF;
            width: 975px;
            height: auto;
            font-size: 25px;
            align-self: auto;
            font-style: SemiBold;
            text-align: center;
            font-family: Poppins;
            font-weight: 600;
            line-height: normal;
            font-stretch: normal;
            margin-right: 0;
            margin-bottom: 0;
            text-decoration: none;
            }
            .footer-text {
            color: #FFFFFF;
            height: auto;
            z-index: 1;
            font-size: 14px;
            align-self: auto;
            text-align: right;
            font-family: Eina01-Bold;
            font-weight: 400;
            line-height: normal;
            margin-left: 3%;
            font-stretch: normal;
            text-decoration: none;
            }
        </style>
    </head>
<body>
    @include('sweetalert::alert')
    <header class="header">
        <div class="frame9396-frame9274">
            <img
                src="/Image/logo.png"
                alt="logo14609"
                class="frame9396-logo1"
            />
            <div class="frame9396-frame9273">
                <span class="header-text">
                    <span>SISTEM PENGURUSAN MAKLUMAT</span>
                </span>
                <span class="frame9396-text2">
                    <span>Program Pembangunan Peneroka (IMS PPP)</span>
                </span>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="navbar">
            @include('layouts.navigation')
        </div>

        <div class="content">
            @yield('innercontent')
        </div>
    </div>
    <footer class="footer">
        <span class="footer-text">
            <span>FELDA PPP © 2022 Program Pembangunan Peneroka (IMS PPP)</span>
        </span>
    </footer>
</body>
</html>
