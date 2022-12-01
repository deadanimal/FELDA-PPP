<link href="//db.onlinewebfonts.com/c/2d57f676e3d6955778fb8acac0176b9a?family=Eina01-Bold" rel="stylesheet" type="text/css"/>
<div class="frame7279-frame7279">
    <span class="frame7279-text"><span>Selamat Datang!</span></span>
    <div class="frame7279-frame9279">
        <img
        src="/Image/people.png"
        alt="Rectangle8282304608"
        class="frame7279-rectangle828230"
        />
        <span class="frame7279-text02"><span>{{Auth::user()->nama}}</span></span>
        <span class="frame7279-text04"><span>{{Auth::user()->idPengguna}}</span></span>
        <a href="/pengurusanPengguna/maklumatPengguna" class="frame7279-frame7122">
            <div class="frame7279-iconpermohonan">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#781E2A" class="bi bi-person-fill" viewBox="0 0 16 16" style="padding-right: 5px;">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                  </svg>
                <span class="frame7279-text06" style="text-align: left; margin-left:5px;"><span>KEMASKINI PROFIL</span></span>
            </div>
        </a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a class="frame7279-frame7123" :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                <div class="frame7279-iconpermohonan">
                    <img
                    src="/SVG/logout.svg"
                    alt="404Logout"
                    class="frame7279-vector"
                    />
                    <span class="frame7279-text06"><span>LOG KELUAR</span></span>
                </div>
            </a>
        </form>
    </div>
    <div class="frame7279-frame7680">
        <a href="/dashboard" class="frame7279-lsemakan-w-t-d">
            <div class="frame7279-frame7262">
                <img
                src="/SVG/menu.svg"
                alt="Vector4856"
                class="frame7279-vector01"
                />
                <span class="frame7279-text08"><span>LAMAN UTAMA</span></span>
            </div>
        </a>
        <button class="frame7279-dropdown" id="pengurusanPengguna" onclick="changebutton()">
            <div class="frame7279-frame7262">
                <img
                src="/SVG/menu.svg"
                alt="Vector4856"
                class="frame7279-vector01"
                />
                <span class="frame7279-text08">
                    <span>PENGURUSAN PENGGUNA</span>
                </span>
            </div>
        </button>
        <div class="dropdown-container">
            <div class="frame9275-log-audit">
                <a href="/pengurusanPengguna/maklumatPengguna" class="frame9275-frame7272" onclick="changedot(this)">
                    <span class="frame9275-text"><span>Maklumat Pengguna</span></span>
                </a>
            </div>
            @if (Auth::user()->kategoripengguna == 1)
            <div class="frame9275-log-audit">
                <a href="/pengurusanPengguna/senaraiPengguna" class="frame9275-frame7272" onclick="changedot(this)">
                    <div class="frame9275-group7679"></div>
                    <span class="frame9275-text"><span>Senarai Pengguna</span></span>
                </a>
            </div>
            <div class="frame9275-log-audit">
                <a href="/pengurusanPengguna/senaraiKategoriPengguna" class="frame9275-frame7272" onclick="changedot(this)">
                    <div class="frame9275-group7679"></div>
                    <span class="frame9275-text"><span>Pengurusan Kategori Pengguna</span></span>
                </a>
            </div>
            @endif
            {{-- <div class="frame9275-log-audit">
                <a class="frame9275-frame7272" onclick="changedot(this)">
                    <div class="frame9275-group7679"></div>
                    <span class="frame9275-text"><span>Lorem Ipsum</span></span>
                </a>
            </div> --}}
        </div>
        <button class="frame7279-dropdown" id="komuniti" onclick="changebutton()">
            <div class="frame7279-frame7262">
                <img
                src="/SVG/menu.svg"
                alt="Vector4856"
                class="frame7279-vector01"
                />
                <span class="frame7279-text08"><span>PENGURUSAN MODUL</span></span>
            </div>
        </button>
        <div class="dropdown-container">
            <div class="frame9275-log-audit">
                <a href="/pengurusanModul/ciptaModul" class="frame9275-frame7272" onclick="changedot(this)">
                    <span class="frame9275-text"><span>Cipta Modul</span></span>
                </a>
            </div>
            <div class="frame9275-log-audit">
                <a href="/pengurusanModul/senaraiModul" class="frame9275-frame7272" onclick="changedot(this)">
                    <div class="frame9275-group7679"></div>
                    <span class="frame9275-text"><span>Senarai Modul</span></span>
                </a>
            </div>
            {{-- <div class="frame9275-log-audit">
                <a class="frame9275-frame7272" onclick="changedot(this)">
                    <span class="frame9275-text"><span>PEMANTAUAN</span></span>
                </a>
            </div> --}}
        </div>
        {{-- <button class="frame7279-dropdown" onclick="changebutton()">
            <div class="frame7279-frame7262">
                <img
                src="/SVG/menu.svg"
                alt="Vector4856"
                class="frame7279-vector01"
                />
                <span class="frame7279-text08"><span>AGROBANK</span></span>
            </div>
        </button>
        <div class="dropdown-container">
            <div class="frame9275-log-audit">
                <a class="frame9275-frame7272" onclick="changedot(this)">
                    <span class="frame9275-text"><span>PERMOHONAN</span></span>
                </a>
            </div>
            <div class="frame9275-log-audit">
                <a class="frame9275-frame7272" onclick="changedot(this)">
                    <div class="frame9275-group7679"></div>
                    <span class="frame9275-text"><span>PEROLEHAN</span></span>
                </a>
            </div>
            <div class="frame9275-log-audit">
                <a class="frame9275-frame7272" onclick="changedot(this)">
                    <span class="frame9275-text"><span>PEMANTAUAN</span></span>
                </a>
            </div>
        </div>
        <button class="frame7279-dropdown" onclick="changebutton()">
            <div class="frame7279-frame7262">
                <img
                src="/SVG/menu.svg"
                alt="Vector4856"
                class="frame7279-vector01"
                />
                <span class="frame7279-text08"><span>PROJEK KHAS</span></span>
            </div>
        </button>
        <div class="dropdown-container">
            <div class="frame9275-log-audit">
                <a class="frame9275-frame7272" onclick="changedot(this)">
                    <span class="frame9275-text"><span>PERMOHONAN</span></span>
                </a>
            </div>
            <div class="frame9275-log-audit">
                <a class="frame9275-frame7272" onclick="changedot(this)">
                    <div class="frame9275-group7679"></div>
                    <span class="frame9275-text"><span>PEROLEHAN</span></span>
                </a>
            </div>
            <div class="frame9275-log-audit">
                <a class="frame9275-frame7272" onclick="changedot(this)">
                    <span class="frame9275-text"><span>PEMANTAUAN</span></span>
                </a>
            </div>
        </div>
        <button class="frame7279-dropdown" onclick="changebutton()">
            <div class="frame7279-frame7262">
                <img
                src="/SVG/menu.svg"
                alt="Vector4856"
                class="frame7279-vector01"
                />
                <span class="frame7279-text08"><span>PROJEK RINTIS</span></span>
            </div>
        </button>
        <div class="dropdown-container">
            <div class="frame9275-log-audit">
                <a class="frame9275-frame7272" onclick="changedot(this)">
                    <span class="frame9275-text"><span>PERMOHONAN</span></span>
                </a>
            </div>
            <div class="frame9275-log-audit">
                <a class="frame9275-frame7272" onclick="changedot(this)">
                    <div class="frame9275-group7679"></div>
                    <span class="frame9275-text"><span>PEROLEHAN</span></span>
                </a>
            </div>
            <div class="frame9275-log-audit">
                <a class="frame9275-frame7272" onclick="changedot(this)">
                    <span class="frame9275-text"><span>PEMANTAUAN</span></span>
                </a>
            </div>
        </div> --}}
        <a href="/auditTrail/audit" class="frame7279-lsemakan-w-t-d">
            <div class="frame7279-frame7262">
                <img
                src="/SVG/menu.svg"
                alt="Vector4856"
                class="frame7279-vector01"
                />
                <span class="frame7279-text08"><span>JEJAK AUDIT</span></span>
            </div>
        </a>
    </div>
</div>
<style>
    .frame7279-frame7279 {
    height: 100%;
    display: flex;
    padding: 20px 0;
    position: relative;
    box-sizing: border-box;
    align-items: center;
    border-color: transparent;
    border-radius: 0px 0px 0px 0px;
    flex-direction: column;
    background-color: #A2335D;;
    }
    .frame7279-text {
    color: #FFFFFF;
    width: 245px;
    height: auto;
    font-size: 25px;
    align-self: auto;
    text-align: center;
    font-family: Poppins;
    font-weight: 600;
    line-height: 32.53916549682617px;
    font-stretch: normal;
    margin-right: 0;
    margin-bottom: 23px;
    text-decoration: none;
    }
    .frame7279-frame9279 {
    display: flex;
    padding: 18px 15px;
    position: relative;
    box-shadow: 0px 2.8837385177612305px 2.8837385177612305px 0px rgba(0, 0, 0, 0.25) ;
    box-sizing: border-box;
    align-items: center;
    border-color: transparent;
    margin-right: 0;
    border-radius: 7.209346771240234px;
    margin-bottom: 23px;
    flex-direction: column;
    background-color: #781E2A;
    }
    .frame7279-rectangle828230 {
    width: 78px;
    height: 78px;
    position: relative;
    box-sizing: border-box;
    border-color: transparent;
    margin-right: 0;
    border-radius: 7.209346771240234px;
    margin-bottom: 18px;
    }
    .frame7279-text02 {
    color: #FFFFFF;
    width: 199px;
    height: auto;
    font-size: 15px;
    align-self: auto;
    font-style: SemiBold;
    text-align: center;
    font-family: Poppins;
    font-weight: 600;
    line-height: 12.976823806762695px;
    font-stretch: normal;
    margin-right: 0;
    margin-bottom: 18px;
    text-decoration: none;
    }
    .frame7279-text04 {
    color: #FFFFFF;
    width: 199px;
    height: auto;
    font-size: 15px;
    align-self: auto;
    font-style: Medium;
    text-align: center;
    font-family: Poppins;
    font-weight: 500;
    line-height: 12.976823806762695px;
    font-stretch: normal;
    margin-right: 0;
    margin-bottom: 18px;
    text-decoration: none;
    }
    .frame7279-frame7123 {
    display: flex;
    padding: 10px 24px;
    position: relative;
    box-shadow: 0px 4.890585422515869px 4.890585422515869px 0px rgba(0, 0, 0, 0.25) ;
    box-sizing: border-box;
    align-items: flex-start;
    border-color: transparent;
    margin-right: 0;
    border-radius: 5.767477035522461px;
    margin-bottom: 0;
    flex-direction: column;
    background-color:#FFFFFF;
    cursor: pointer;
    }
    .frame7279-frame7122 {
    display: flex;
    padding: 10px 20px;
    position: relative;
    box-shadow: 0px 4.890585422515869px 4.890585422515869px 0px rgba(0, 0, 0, 0.25) ;
    box-sizing: border-box;
    align-items: flex-start;
    border-color: transparent;
    margin-right: 0;
    border-radius: 5.767477035522461px;
    flex-direction: column;
    background-color:#FFFFFF;
    cursor: pointer;
    text-decoration: none; 
    margin-bottom: 10px; 
    width:151px;
    }
    .frame7279-iconpermohonan {
    display: flex;
    position: relative;
    box-sizing: border-box;
    align-items: center;
    border-color: transparent;
    margin-right: 0;
    border-radius: 0px 0px 0px 0px;
    margin-bottom: 0;
    }
    .frame7279-vector {
    width: 14px;
    height: 15px;
    position: relative;
    box-sizing: border-box;
    border-color: transparent;
    margin-right: 2px;
    margin-bottom: 0;
    }
    .frame7279-image {
    width: 19px;
    height: 20px;
    position: relative;
    box-sizing: border-box;
    border-color: transparent;
    margin-right: 2px;
    margin-bottom: 0;
    background-color: #781E2A;
    }
    .frame7279-text06 {
    color: #781E2A;
    width: 87px;
    height: auto;
    font-size: 12.976823806762695px;
    align-self: auto;
    font-style: ☞;
    text-align: center;
    font-family: Eina01-Bold;
    font-weight: 400;
    line-height: 12.976823806762695px;
    font-stretch: normal;
    margin-right: 0;
    margin-bottom: 0;
    text-decoration: none;
    }
    .frame7279-frame7680 {
    display: flex;
    position: relative;
    box-sizing: border-box;
    align-items: flex-start;
    border-color: transparent;
    margin-right: 0;
    border-radius: 0px 0px 0px 0px;
    margin-bottom: 0;
    flex-direction: column;
    }
    .frame7279-audittrail {
    width: 388px;
    display: flex;
    padding: 21px 42px;
    position: relative;
    box-sizing: border-box;
    align-items: flex-start;
    flex-shrink: 0;
    border-color: transparent;
    margin-right: 0;
    border-radius: 0px 0px 0px 0px;
    margin-bottom: 7px;
    flex-direction: column;
    background-color: #781E2A;
    }
    .frame7279-frame7262 {
    display: flex;
    position: relative;
    box-sizing: border-box;
    align-items: center;
    border-color: transparent;
    margin-right: 0;
    border-radius: 0px 0px 0px 0px;
    margin-bottom: 0;
    }
    .frame7279-vector01 {
    width: 25px;
    height: 28px;
    position: relative;
    box-sizing: border-box;
    border-color: transparent;
    margin-right: 17px;
    margin-bottom: 0;
    src: url();
    }
    .frame7279-text08 {
    color: #FFFFFF;
    width: 225px;
    height: auto;
    font-size: 15px;
    align-self: auto;
    font-style: ☞;
    text-align: left;
    font-family: Eina01-Bold;
    font-weight: 400;
    line-height: normal;
    font-stretch: normal;
    margin-right: 0;
    margin-bottom: 0;
    text-decoration: none;
    }
    .frame7279-lsemakan-w-t-d {
    width: 388px;
    display: flex;
    padding: 21px 42px;
    position: relative;
    box-sizing: border-box;
    align-items: flex-start;
    flex-shrink: 0;
    border-color: transparent;
    margin-right: 0;
    border-radius: 0px 0px 0px 0px;
    margin-bottom: 7px;
    flex-direction: column;
    cursor: pointer;
    text-decoration: none;
    }
    .frame7279-dropdown {
    display: flex;
    padding: 17px 42px;
    position: relative;
    box-sizing: border-box;
    align-items: flex-start;
    border-color: transparent;
    margin-right: 0;
    border-radius: 0px 0px 0px 0px;
    margin-bottom: 7px;
    flex-direction: column;
    background-color: rgba(0, 52, 120, 0);
    outline: none;
    cursor: pointer;
    text-decoration: none;
    width:100%;
    background-image:url('/SVG/arrow.svg');
    background-repeat: no-repeat;
    background-position:90% center;
    }
    .dropdown-container {
    display: none;
    background-color: rgba(0, 52, 120, 0);
    padding-left: 8px;
    }
    .frame7279-vector03 {
    width: 11px;
    height: 16px;
    position: relative;
    box-sizing: border-box;
    border-color: transparent;
    margin-right: 0;
    margin-bottom: 0;
    }
    .active {
    background-color: #781E2A;
    color: white;
    background-image: url('/SVG/arrowdown.svg');
    background-repeat: no-repeat;
    background-position:90% center;
    }

    .changeimg {
        display: flex;
        position: relative;
        align-self: center;
        box-sizing: border-box;
        align-items: flex-start;
        border-color: transparent;
        margin-left: -10px;
        border-radius: 0px 0px 0px 0px;
        margin-bottom: 0;
        background-color: rgba(255, 255, 255, 0);
        cursor: pointer;
        background-image:url('/SVG/dotdrop2.svg'); 
        background-repeat: no-repeat;
        background-position:left;
    }

    .frame9275-log-audit {
    display: flex;
    padding: 24px 44px;
    position: relative;
    box-sizing: border-box;
    align-items: flex-start;
    border-color: transparent;
    margin-right: 0;
    border-radius: 0px 0px 0px 0px;
    margin-bottom: 0px;
    flex-direction: column;
    }
.frame9275-frame7272 {
  display: flex;
  position: relative;
  align-self: center;
  box-sizing: border-box;
  align-items: flex-start;
  border-color: transparent;
  margin-left: -10px;
  border-radius: 0px 0px 0px 0px;
  margin-bottom: 0;
    background-color: rgba(255, 255, 255, 0);
    cursor: pointer;
    background-image:url('/SVG/dotdrop.svg'); 
    background-repeat: no-repeat;
    background-position:left;
  text-decoration: none;
}
.frame9275-text {
  color: white;
  width: 225px;
  height: auto;
  font-size: 15.86056137084961px;
  align-self: center;
  text-align: left;
  font-family: Eina01-Bold;
  font-weight: 400;
  line-height: normal;
  font-stretch: normal;
  padding-left:40px;
  margin-right: 0;
  margin-bottom: 0;
  text-decoration: none;
}
</style>
<script type='text/javascript'>

// function changedot() {
//     var dotdrop = document.getElementsByClassName("frame9275-frame7272");
//     var x;
//     for (x = 0; x < dotdrop.length; x++) {
//         dotdrop[x].addEventListener("click", function() {
//             this.classList.toggle("changeimg");
//         });
//     }
// }

function changebutton() {
    var dropdown = document.getElementsByClassName("frame7279-dropdown");
    var i;

    for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
            } else {
                dropdownContent.style.display = "block";
            }
        });
    }
}

function changedot(element){
    var dotdrop = element;
    
    if (dotdrop.className == 'frame9275-frame7272') {
        dotdrop.className = 'changeimg';
    }
    else {
        dotdrop.className = 'frame9275-frame7272';
    };
}
</script>