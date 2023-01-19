<!DOCTYPE html>
<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
<link rel="preconnect" href="https://fonts.googleapis.com"> 
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,600;0,700;1,500;1,900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<body>
    <div class="log-masuk-log-masuk">
        <div class="log-masuk-logmasuk1">
            <form method="POST" action="/forgot">
                @csrf
                <div class="log-masuk-logbox">
                    <div class="log-masuk-frame9398">
                        <span class="log-masuk-text">Lupa Kata Laluan</span>
                        <span class="log-masuk-text02">
                        Sila masukkan alamat ID Pengguna 
                        </span>
                    </div>
                    <div class="log-masuk-frame9">
                        <div class="log-masuk-frame12">
                        <span class="log-masuk-text04">E-mel</span>
                        <label>
                            <input class="log-masuk-rectangle46" type="email" name="email" placeholder="eg:aliabu@gmail.com"/>
                        </label>
                        </div>
                    </div>
  
                    <button class="log-masuk-button6">
                        {{ __('Hantar') }}
                    </button>
                </div>
            </form>
            <div class="log-masuk-logwelcome">
            <div class="log-masuk-text14">
                Selamat
                <br />
                Datang ke
                </div>
            <span class="log-masuk-text19">
                Sistem Pengurusan Maklumat
                <br />
                Program Pembangunan Peneroka (IMS PPP)
            </span>
            </div>
        </div>
    </div>
</body>
<style>
html {
  background: url("/Image/background.jpeg");
  background-repeat: no-repeat;
  background-size: cover;
  font-family: 'Poppins', sans-serif;
  min-height: 100%;
}
body{
  margin:10%;
  align-items: center;
}
.log-masuk-log-masuk {
  display: flex;
  position: relative;
  box-sizing: border-box;
  align-items: center;
  flex-shrink: 0;
  border-style: solid;
  border-width: 0px;
  border-radius: 0px 0px 0px 0px;
  flex-direction: column;
  justify-content: center;
  margin:auto;
  background-color: rgba(255, 255, 255, 0);
}
.log-masuk-logmasuk1 {
  display: flex;
  z-index: 1;
  align-self: center;
  box-sizing: border-box;
  align-items: center;
  border-width: 0px;
  border-radius: 0px 0px 0px 0px;
  justify-content: center;
}
.log-masuk-logbox {
  display: flex;
  padding: 39px 62px;
  position: relative;
  box-shadow: 0px 4px 24px -4px rgba(0, 0, 0, 0.25) ;
  box-sizing: border-box;
  align-items: flex-start;
  margin-right: 137px;
  border-radius: 15px;
  max-height:559px;
  max-width:560px;
  margin-bottom: 0;
  flex-direction: column;
  background: linear-gradient(181.36deg, rgba(225, 225, 225, 0.61) -24.18%, rgba(241, 241, 241, 0) 105.9%);
  backdrop-filter: blur(5px);
  border-image-source: linear-gradient(210.57deg, rgba(255, 255, 255, 0.47) 6.66%, rgba(255, 255, 255, 0) 93.17%);


}
.log-masuk-frame9398 {
  display: flex;
  position: relative;
  box-sizing: border-box;
  align-items: flex-start;
  border-color: transparent;
  margin-right: 0;
  border-radius: 0px 0px 0px 0px;
  margin-bottom: 24px;
  flex-direction: column;
}
.log-masuk-text {
  color: rgba(255, 255, 255, 1);
  width: 366px;
  height: auto;
  font-size: 35px;
  align-self: auto;
  text-align: left;
  font-family: 'Poppins';
  font-weight: 600;
  line-height: 27px;
  font-stretch: normal;
  margin-right: 0;
  margin-bottom: 10px;
  text-decoration: none;
}
.log-masuk-text02 {
  color: rgba(255, 255, 255, 1);
  width: 366px;
  height: auto;
  font-size: 18px;
  align-self: auto;
  font-style: italic;
  text-align: left;
  font-weight: 500;
  line-height: 18px;
  font-stretch: normal;
  margin-right: 0;
  margin-bottom: 0;
  text-decoration: none;
}
.log-masuk-frame9 {
  width: auto;
  height: 90px;
  display: flex;
  position: relative;
  box-sizing: border-box;
  align-items: center;
  flex-shrink: 0;
  border-color: transparent;
  margin-right: 0;
  border-radius: 0px 0px 0px 0px;
  margin-bottom: 24px;
  flex-direction: column;
}
.log-masuk-frame12 {
  width: auto;
  height: 90px;
  display: flex;
  padding: 10px 0 10px 0px;
  position: relative;
  box-sizing: border-box;
  align-items: flex-start;
  flex-shrink: 0;
  border-color: transparent;
  margin-right: 0;
  border-radius: 0px 0px 0px 0px;
  margin-bottom: 0;
  flex-direction: column;
}

.log-masuk-frame121 {
  width: auto;
  height: 90px;
  display: flex;
  padding: 10px 0 10px 0px;
  position: relative;
  box-sizing: border-box;
  align-items: flex-start;
  flex-shrink: 0;
  border-color: transparent;
  margin-right: 0;
  border-radius: 0px 0px 0px 0px;
  margin-bottom: 0;
  flex-direction: column;
}

.log-masuk-text04 {
  color: rgba(255, 255, 255, 1);
  width: 100px;
  height: auto;
  font-size: 15px;
  align-self: auto;
  text-align: left;
  font-family: 'Poppins';
  font-weight: 600;
  line-height: normal;
  font-stretch: normal;
  margin-right: 0;
  margin-bottom: 10px;
  text-decoration: none;
}
::placeholder { 
  color: black;
  font-size: 16px;
  font-family: 'Poppins';
  font-style:italic;
  font-weight: 500;
  opacity: 0.6;
}

.log-masuk-rectangle46 {
  width: 366px;
  height: 40px;
  font-size: 16px;
  position: relative;
  box-sizing: border-box;
  border-color: rgba(255, 255, 255, 1);
  background-color: rgba(255, 255, 255, 0.55);
  border-style: solid;
  border-width: 1px;
  margin-right: 0;
  border-radius: 5px;
  margin-bottom: 0;
  padding-left:20px;
  color: black;
}

label {
  position: relative;
}

.log-masuk-frame12 label:before {
  content: "";
  position: absolute;
  left: 5px;
  top: 0;
  bottom: 0;
  width: 11px;
  background: url("/SVG/person.svg") center / contain no-repeat;
}

.log-masuk-frame4 {
  width: auto;
  height: 90px;
  display: flex;
  position: relative;
  box-sizing: border-box;
  align-items: center;
  flex-shrink: 0;
  border-color: transparent;
  margin-right: 0;
  border-radius: 0px 0px 0px 0px;
  margin-bottom: 24px;
  flex-direction: column;
}

.log-masuk-text06 {
  color: rgba(255, 255, 255, 1);
  height: auto;
  font-size: 15px;
  align-self: auto;
  text-align: left;
  font-family: 'Poppins';
  font-weight: 600;
  line-height: normal;
  font-stretch: normal;
  margin-right: 0;
  margin-bottom: 10px;
  text-decoration: none;
}

.log-masuk-frame5 {
  display: flex;
  position: relative;
  box-sizing: border-box;
  align-items: center;
  border-color: transparent;
  border-collapse: separate; 
  margin-right: 0;
  border-radius: 10px;
  margin-bottom: 24px;
  padding-left:20px;
}

.log-masuk-rectangle828081 {
  width: 23px;
  height: 23px;
  position: relative;
  background: rgba(255, 255, 255, 1);
  margin-right: 13px;
  border-radius: 10px;
  margin-bottom: 0;
}

.log-masuk-text08 {
  color: rgba(255, 255, 255, 1);
  width: 100px;
  height: auto;
  font-size: 15px;
  align-self: auto;
  font-style: Medium;
  text-align: left;
  font-family: 'Poppins';
  font-weight: 500;
  line-height: normal;
  font-stretch: normal;
  margin-right: 0;
  margin-bottom: 0;
  text-decoration: none;
}
.log-masuk-button6 {
  width: 366px;
  height: 49px;
  display: flex;
  opacity: 0.50;
  padding: 11px 109px;
  position: relative;
  box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25) ;
  box-sizing: border-box;
  align-items: center;
  flex-shrink: 0;
  border-color: transparent;
  margin-right: 0;
  border-radius: 10px;
  margin-bottom: 24px;
  flex-direction: column;
  background: #FFFFFF;
  color: #781E2A;
  font-style: Bold;
  text-align: center;
  font-weight: 700;
  line-height: normal;
  font-size: 18px;
  cursor: pointer;
}
.log-masuk-button6:hover {
  opacity:1; 
}
.log-masuk-text10 {
  color: #781E2A;
  height: auto;
  font-size: 18px;
  align-self: auto;
  font-style: Bold;
  text-align: center;
  font-family: 'Poppins';
  font-weight: 700;
  line-height: normal;
  font-stretch: normal;
  margin-right: center;
  margin-bottom: center;
  text-decoration: none;
}
.log-masuk-button7 {
  width: 366px;
  height: 49px;
  display: flex;
  opacity: 0.50;
  padding: 11px 128px;
  position: relative;
  box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25) ;
  box-sizing: border-box;
  align-items: center;
  flex-shrink: 0;
  border-color: transparent;
  margin-right: 0;
  border-radius: 10px;
  margin-bottom: 0;
  flex-direction: column;
  background: #FFFFFF;
  color: #781E2A;
  font-style: Bold;
  text-align: center;
  font-weight: 700;
  line-height: normal;
  font-size: 15px;
}
.log-masuk-button7:hover {
  opacity:1; 
}

.log-masuk-text12 {
  color: #781E2A;
  height: auto;
  font-size: 15px;
  align-self: auto;
  text-align: center;
  font-family: 'Poppins';
  font-weight: 600px;
  line-height: normal;
  font-stretch: normal;
  margin-right: center;
  margin-bottom: center;
  text-decoration: none;
}
.log-masuk-logwelcome {
  color: rgba(255, 255, 255, 1);
  display: flex;
  position: relative;
  box-sizing: border-box;
  align-items: flex-start;
  border-color: transparent;
  margin-right: 0;
  border-radius: 0px 0px 0px 0px;
  margin-bottom: 0;
  flex-direction: column;
  max-width: 620px;
  min-height: 437.51px;
}
.log-masuk-text14 {
  color: #FFFFFF;
  text-shadow: 0px 2px 4px rgba(0, 0, 0, 0.25);
  width: auto;
  height: auto;
  font-size: 100px;
  align-self: auto;
  font-style: Bold;
  text-align: left;
  font-family: 'Poppins';
  font-weight: 900;
  line-height: 100px;
  font-stretch: normal;
  margin-right: 0;
  margin-bottom: 96px;
  text-decoration: none;
}
.log-masuk-text19 {
  width: auto;
  height: auto;
  font-size: 40px;
  align-self: auto;
  text-align: left;
  font-family: 'Poppins';
  font-weight: 600;
  line-height: 60px;
  font-stretch: normal;
  margin-right: 0;
  margin-bottom: 0;
  text-decoration: none;
  color: #FFFFFF;
  text-shadow: 0px 2px 4px rgba(0, 0, 0, 0.25);
}
</style>
<script>
  function showPassFunction(){
  var x = document.getElementById("passcode");
  var eye = document.getElementById("iconPass");
  if (x.type === "password") {
    eye.classList.toggle('fa-eye-slash');
    x.type = "text";
  } else {
    x.type = "password";
    eye.classList.remove('fa-eye-slash');
  }
}

</script>