@extends('layouts.guest')

@section('innercontent')
<style>
.frame9396-frame9396 {
  width: max-content;
  box-sizing: border-box;
  align-items: center;
  border-color: transparent;
  border-radius: 0px 0px 0px 0px;
  padding: 60px 20px 0px 47px;
  flex-direction: column;
}
.frame9396-frame9397 {
  width: 100%;
  display: flex;
  position: relative;
  box-sizing: border-box;
  align-items: center;
  border-color: transparent;
  margin-right: 0;
  border-radius: 0px 0px 0px 0px;
  margin-bottom: 15px;
  justify-content: center;
}
.frame9396-frame93971 {
  display: flex;
  position: relative;
  box-sizing: border-box;
  align-items: center;
  margin-left: 1px;
  border-color: transparent;
  margin-right: 38px;
  border-radius: 0px 0px 0px 0px;
  margin-bottom: 0;
  flex-direction: column;
}
.frame9396-frame9333 {
  width: inherit;
  height: 68px;
  display: flex;
  padding: 0 31px;
  position: relative;
  box-shadow: 0px 3px 4px 0px rgba(250, 167, 167, 0.25) ;
  box-sizing: border-box;
  align-items: flex-start;
  flex-shrink: 0;
  border-color: transparent;
  margin-right: 0;
  border-radius: 10px;
  margin-bottom: 7px;
  background-color: #8C263C;
}
.frame9396-text {
  color: white;
  width: 120px;
  height: auto;
  font-size: 18px;
  align-self: center;
  font-style: ☞;
  text-align: left;
  font-family: Eina01-Bold;
  font-weight: 400;
  line-height: normal;
  font-stretch: normal;
  margin-right: 83px;
  margin-bottom: 0;
  text-decoration: none;
}
.frame9396-text05 {
  color: white;
  width: 120px;
  height: auto;
  font-size: 18px;
  align-self: center;
  font-style: ☞;
  text-align: right;
  font-family: Eina01-Bold;
  font-weight: 400;
  line-height: normal;
  font-stretch: normal;
  margin-right: 0;
  margin-bottom: 0;
  text-decoration: none;
}
.frame9396-frame9332 {
  width: inherit;
  height: 52px;
  display: flex;
  padding: 0 31px;
  position: relative;
  box-shadow: 0px 3px 4px 0px rgba(250, 167, 167, 0.25) ;
  box-sizing: border-box;
  align-items: flex-start;
  flex-shrink: 0;
  border-color: rgba(120, 30, 42, 1);
  border-style: solid;
  border-width: 1px;
  margin-right: 0;
  border-radius: 10px;
  margin-bottom: 7px;
  background-color: white;
}
.frame9396-text07 {
  color: rgba(0, 0, 0, 1);
  width: 120px;
  height: auto;
  font-size: 15px;
  align-self: center;
  text-align: left;
  font-family: Eina01-SemiBold;
  font-weight: 400;
  line-height: normal;
  font-stretch: normal;
  margin-right: 83px;
  margin-bottom: 0;
  text-decoration: none;
}
.frame9396-text12 {
  color: rgba(0, 0, 0, 1);
  width: 120px;
  height: auto;
  font-size: 15px;
  align-self: center;
  font-style: ☞;
  text-align: right;
  font-family: Eina01-SemiBold;
  font-weight: 400;
  line-height: normal;
  font-stretch: normal;
  margin-right: 0;
  margin-bottom: 0;
  text-decoration: none;
}
.frame9396-frame9334 {
  width: inherit;
  height: 52px;
  display: flex;
  padding: 0 31px;
  position: relative;
  box-shadow: 0px 3px 4px 0px rgba(250, 167, 167, 0.25) ;
  box-sizing: border-box;
  align-items: flex-start;
  flex-shrink: 0;
  border-color: rgba(120, 30, 42, 1);
  border-style: solid;
  border-width: 1px;
  margin-right: 0;
  border-radius: 10px;
  margin-bottom: 7px;
  background-color: white;
}
.frame9396-text14 {
  color: rgba(0, 0, 0, 1);
  width: 120px;
  height: auto;
  font-size: 15px;
  align-self: center;
  font-style: ☞;
  text-align: left;
  font-family: Eina01-SemiBold;
  font-weight: 400;
  line-height: normal;
  font-stretch: normal;
  margin-right: 83px;
  margin-bottom: 0;
  text-decoration: none;
}
.frame9396-text19 {
  color: rgba(0, 0, 0, 1);
  width: 120px;
  height: auto;
  font-size: 15px;
  align-self: center;
  text-align: right;
  font-family: Eina01-SemiBold;
  font-weight: 400;
  line-height: normal;
  font-stretch: normal;
  margin-right: 0;
  margin-bottom: 0;
  text-decoration: none;
}
.frame9396-frame9335 {
  width: inherit;
  height: 52px;
  display: flex;
  padding: 0 31px;
  position: relative;
  box-shadow: 0px 3px 4px 0px rgba(250, 167, 167, 0.25) ;
  box-sizing: border-box;
  align-items: flex-start;
  flex-shrink: 0;
  border-color: rgba(120, 30, 42, 1);
  border-style: solid;
  border-width: 1px;
  margin-right: 0;
  border-radius: 10px;
  margin-bottom: 0;
  background-color: white;
}
.frame9396-text21 {
  color: rgba(0, 0, 0, 1);
  width: 120px;
  height: auto;
  font-size: 15px;
  align-self: center;
  font-style: ☞;
  text-align: left;
  font-family: Eina01-SemiBold;
  font-weight: 400;
  line-height: normal;
  font-stretch: normal;
  margin-right: 83px;
  margin-bottom: 0;
  text-decoration: none;
}
.frame9396-text26 {
  color: rgba(0, 0, 0, 1);
  width: 120px;
  height: auto;
  font-size: 15px;
  align-self: center;
  font-style: ☞;
  text-align: right;
  font-family: Eina01-SemiBold;
  font-weight: 400;
  line-height: normal;
  font-stretch: normal;
  margin-right: 0;
  margin-bottom: 0;
  text-decoration: none;
}
.frame9396-frame93972 {
  width: inherit;
  height: auto;
  display: flex;
  position: relative;
  box-sizing: border-box;
  align-items: center;
  border-color: transparent;
  margin-right: 0;
  border-radius: 0px 0px 0px 0px;
  margin-bottom: 0;
  justify-content: center;
}
.frame9396-frame9336 {
  height: 238px;
  width: 259px;
  display: flex;
  position: relative;
  align-self: stretch;
  box-shadow: 0px 3px 4px 0px rgba(250, 167, 167, 0.25) ;
  box-sizing: border-box;
  align-items: center;
  flex-shrink: 0;
  padding-top: 15px;
  border-color: rgba(120, 30, 42, 1);
  border-style: solid;
  border-width: 1px;
  margin-right: 8px;
  padding-left: 1px;
  border-radius: 10px;
  margin-bottom: 0;
  padding-right: 1px;
  flex-direction: column;
  padding-bottom: 23px;
  background-color: white;
}
.frame9396-text28 {
  color: #781E2A;
  width: 148px;
  height: auto;
  font-size: 20px;
  align-self: auto;
  font-style: ☞;
  text-align: center;
  font-family: Eina02-Bold;
  font-weight: 400;
  line-height: normal;
  font-stretch: normal;
  margin-right: 0;
  margin-bottom: 0;
  text-decoration: none;
}
.frame9396-frame9337 {
  height: 238px;
  width: 259px;
  display: flex;
  padding: 15px 1px 23px 1px;
  position: relative;
  box-shadow: 0px 3px 4px 0px rgba(250, 167, 167, 0.25) ;
  box-sizing: border-box;
  align-items: center;
  margin-left: 8px;
  border-color: rgba(120, 30, 42, 1);
  border-style: solid;
  border-width: 1px;
  margin-right: 8px;
  border-radius: 10px;
  margin-bottom: 0;
  flex-direction: column;
  background-color: white;
}
.frame9396-text30 {
  color: #781E2A;
  width: 218px;
  height: auto;
  font-size: 20px;
  align-self: auto;
  font-style: ☞;
  text-align: center;
  font-family: Eina02-Bold;
  font-weight: 400;
  line-height: normal;
  font-stretch: normal;
  margin-right: 0;
  margin-bottom: 0;
  text-decoration: none;
}
.frame9396-frame9338 {
  height: 238px;
  width: 259px;
  display: flex;
  padding: 15px 1px 24px 1px;
  position: relative;
  box-shadow: 0px 3px 4px 0px rgba(250, 167, 167, 0.25) ;
  box-sizing: border-box;
  align-items: center;
  margin-left: 8px;
  border-color: rgba(120, 30, 42, 1);
  border-style: solid;
  border-width: 1px;
  margin-right: 0px;
  border-radius: 10px;
  margin-bottom: 0;
  flex-direction: column;
  background-color: white;
}
.frame9396-text32 {
  color: #781E2A;
  width: 218px;
  height: auto;
  font-size: 20px;
  align-self: auto;
  font-style: ☞;
  text-align: center;
  font-family: Eina02-Bold;
  font-weight: 400;
  line-height: normal;
  font-stretch: normal;
  margin-right: 0;
  margin-bottom: 0;
  text-decoration: none;
}
.frame9396-frame93973 {
  display: flex;
  position: relative;
  box-sizing: border-box;
  align-items: flex-start;
  border-color: transparent;
  margin-right: 0;
  border-radius: 0px 0px 0px 0px;
  margin-bottom: 0;
}
.frame9396-frame93974 {
  width: inherit;
  display: flex;
  position: relative;
  box-sizing: border-box;
  align-items: center;
  border-color: transparent;
  margin-right: 8px;
  border-radius: 0px 0px 0px 0px;
  margin-bottom: 0;
  flex-direction: column;
  justify-content: center;
}
.frame9396-frame9339 {
  display: flex;
  padding: 3px 92px;
  position: relative;
  box-shadow: 0px 3px 4px 0px rgba(250, 167, 167, 0.25) ;
  box-sizing: border-box;
  align-items: flex-start;
  border-color: rgba(120, 30, 42, 1);
  border-style: solid;
  border-width: 1px;
  margin-right: 0;
  border-radius: 10px;
  margin-bottom: 16px;
  flex-direction: column;
  background-color: white;
}
.frame9396-frame93961 {
    display: flex;
  position: relative;
  box-sizing: border-box;
  align-items: center;
  border-color: transparent;
  margin-right: 0;
  border-radius: 0px 0px 0px 0px;
  margin-bottom: 16px;
  justify-content: flex-end;
}
.frame9396-frame9341 {
    width: 614px;
  display: flex;
  position: relative;
  box-shadow: 0px 3px 4px 0px rgba(250, 167, 167, 0.25) ;
  box-sizing: border-box;
  align-items: flex-start;
  flex-shrink: 0;
  padding-top: 0px;
  border-color: rgba(120, 30, 42, 1);
  border-style: solid;
  border-width: 1px;
  margin-right: 0;
  padding-left: 0px;
  border-radius: 10px;
  margin-bottom: 0;
  padding-right: 0px;
  padding-bottom: 0px;
  background-color: white;
}
.frame9396-frame93962 {
    width: auto;
  height: auto;
  display: flex;
  overflow: hidden;
  position: relative;
  box-sizing: border-box;
  align-items: center;
  flex-shrink: 0;
  border-color: transparent;
  margin-right: 0;
  border-radius: 0px 0px 0px 0px;
  margin-bottom: 0;
  flex-direction: column;
  justify-content: center;
  padding-left: 5px;
}
.frame9396-frame9343 {
    width: 154px;
  height: 60px;
  display: flex;
  padding: 5px 24px;
  overflow: hidden;
  justify-content:center;
  position: relative;
  box-sizing: border-box;
  align-items: flex-start;
  flex-shrink: 0;
  border-color: transparent;
  margin-right: 0;
  border-radius: 0 10px 0 0;
  margin-bottom: 26px;
  flex-direction: column;
  background-image: linear-gradient(-71deg, rgba(120, 30, 42, 1) 0%, rgba(162, 51, 93, 1) 48%, rgba(123, 31, 45, 1) 100%);
}
.frame9396-text34 {
  color: rgba(255, 255, 255, 1);
  width: 107px;
  height: auto;
  font-size: 30px;
  align-self: auto;
  text-align: center;
  font-family: Eina01-SemiBold;
  font-weight: 400;
  line-height: normal;
  font-stretch: normal;
  margin-right: 0;
  margin-bottom: 4px;
  text-decoration: none;
}
.frame9396-text36 {
  color: rgba(255, 255, 255, 1);
  width: 107px;
  height: auto;
  font-size: 15px;
  align-self: auto;
  font-style: ☞;
  text-align: center;
  font-family: Eina02-Bold;
  font-weight: 400;
  line-height: normal;
  font-stretch: normal;
  margin-right: 0;
  margin-bottom: 0;
  text-decoration: none;
}
.frame9396-frame9344 {
  width: 100%;
  height: 31px;
  display: flex;
  justify-content:center;
  overflow: hidden;
  position: relative;
  box-sizing: border-box;
  align-items: flex-start;
  flex-shrink: 0;
  border-color: transparent;
  margin-right: 0;
  border-radius: 0px 0px 0px 0px;
  margin-bottom: 25px;
  flex-direction: column;
  background-color: #F1F1F1;
}
.frame9396-text38 {
  color: #781E2A;
  width: 155px;
  height: auto;
  font-size: 20px;
  align-self: auto;
  text-align: center;
  font-family: Eina02-Bold;
  font-weight: 400;
  line-height: normal;
  font-stretch: normal;
  margin-right: 0;
  margin-bottom: 0;
  text-decoration: none;
}
.frame9396-frame9342 {
  width: 154px;
  height: 65px;
  display: flex;
  padding: 10px 24px;
  overflow: hidden;
  position: relative;
  align-self: center;
  justify-content:center;
  box-sizing: border-box;
  align-items: flex-start;
  flex-shrink: 0;
  border-color: transparent;
  margin-right: 0;
  border-radius: 0 0 10px;
  margin-bottom: 0;
  flex-direction: column;
  background-image: linear-gradient(-71deg, rgba(120, 30, 42, 1) 0%, rgba(162, 51, 93, 1) 48%, rgba(123, 31, 45, 1) 100%);
}
.frame9396-text40 {
  color: rgba(255, 255, 255, 1);
  width: 107px;
  height: auto;
  font-size: 30px;
  align-self: auto;
  font-style: ☞;
  text-align: center;
  font-family: Eina01-SemiBold;
  font-weight: 400;
  line-height: normal;
  font-stretch: normal;
  margin-right: 0;
  margin-bottom: 4px;
  text-decoration: none;
}
.frame9396-text42 {
  color: rgba(255, 255, 255, 1);
  width: 107px;
  height: auto;
  font-size: 15px;
  align-self: auto;
  font-style: ☞;
  text-align: center;
  font-family: Eina02-Bold;
  font-weight: 400;
  line-height: normal;
  font-stretch: normal;
  margin-right: 0;
  margin-bottom: 0;
  text-decoration: none;
}
.frame9396-frame9346 {
  display: flex;
  width: 614px;
  position: relative;
  box-shadow: 0px 3px 4px 0px rgba(250, 167, 167, 0.25) ;
  box-sizing: border-box;
  align-items: flex-start;
  border-color: rgba(120, 30, 42, 1);
  border-style: solid;
  border-width: 1px;
  margin-right: 0;
  border-radius: 10px;
  margin-bottom: 0;
  flex-direction: column;
  background-color: white;
}
.frame9396-frame93975 {
  display: flex;
  position: relative;
  align-self: center;
  box-sizing: border-box;
  align-items: flex-start;
  border-color: transparent;
  margin-right: 0;
  border-radius: 0px 0px 0px 0px;
  margin-bottom: 0;
  flex-direction: column;
}
.frame9396-frame9340 {
  width: 614px;
  display: flex;
  padding: 3px 11px;
  position: relative;
  box-shadow: 0px 3px 4px 0px rgba(250, 167, 167, 0.25) ;
  box-sizing: border-box;
  align-items: flex-start;
  flex-shrink: 0;
  border-color: rgba(120, 30, 42, 1);
  border-style: solid;
  border-width: 1px;
  margin-right: 0;
  border-radius: 10px;
  margin-bottom: 16px;
  flex-direction: column;
  background-color: white;
}
.frame9396-screenshot20220927at2402 {
  width: 583px;
  height: 262px;
  position: relative;
  box-sizing: border-box;
  border-color: transparent;
  margin-right: 0;
  margin-bottom: 0;
}
.frame9396-frame9345 {
  width:614px;
  display: flex;
  padding: 2px 50px;
  position: relative;
  box-shadow: 0px 3px 4px 0px rgba(250, 167, 167, 0.25) ;
  box-sizing: border-box;
  align-items: flex-start;
  border-color: rgba(120, 30, 42, 1);
  border-style: solid;
  border-width: 1px;
  margin-right: 0;
  border-radius: 10px;
  margin-bottom: 16px;
  flex-direction: column;
  background-color: white;
}
.frame9396-screenshot20220927at24021 {
  width: 438px;
  height: 197px;
  position: relative;
  box-sizing: border-box;
  border-color: transparent;
  margin-right: 0;
  margin-bottom: 0;
}
.frame9396-frame9347 {
  width: 614px;
  display: flex;
  padding: 2px 50px;
  position: relative;
  box-shadow: 0px 3px 4px 0px rgba(250, 167, 167, 0.25) ;
  box-sizing: border-box;
  align-items: flex-start;
  flex-shrink: 0;
  border-color: rgba(120, 30, 42, 1);
  border-style: solid;
  border-width: 1px;
  margin-right: 0;
  border-radius: 10px;
  margin-bottom: 0;
  flex-direction: column;
  background-color: white;
}
.frame9396-screenshot20220927at3011 {
  width: 439px;
  height: 196px;
  position: relative;
  box-sizing: border-box;
  border-color: transparent;
  margin-right: 0;
  margin-bottom: 0;
}
#chartdiv {
  width: 100%;
  height: 175px;
}
#chartdiv2 {
  width: 100%;
  height: 175px;
}
#chartdiv3 {
  width: 100%;
  height: 175px;
}
#piechartdiv {
  width: 428px;
  height:262px;
}
#sortedbardiv {
  width: 100%;
  height: 207px;
}
#stackbardiv {
  width: 100%;
  height: 205px;
}
#dragbardiv1 {
  width: 100%;
  height: 262px;
}
#dragbardiv2 {
  width: 100%;
  height: 201px;
}
#clustchartdiv {
  width: 100%;
  height: 201px;
}
</style>
<div class="frame9396-frame9396">
    <div class="frame9396-frame9397">
        <div class="frame9396-frame93971">
            <div class="frame9396-frame9333">
                <span class="frame9396-text">
                    <span>
                        <span>Penerimaan</span>
                        <br />
                        <span>Dana</span>
                    </span>
                </span>
                <span class="frame9396-text05"><span>234,296,352</span></span>
            </div>
            <div class="frame9396-frame9332">
                <span class="frame9396-text07">
                    <span>
                        <span>Komitmen</span>
                        <br />
                        <span>Kelulusan</span>
                    </span>
                </span>
                <span class="frame9396-text12"><span>234,296,352</span></span>
            </div>
            <div class="frame9396-frame9334">
                <span class="frame9396-text14">
                    <span>
                        <span>Komitmen</span>
                        <br />
                        <span>Dicaj</span>
                    </span>
                </span>
                <span class="frame9396-text19"><span>135,999,441</span></span>
            </div>
            <div class="frame9396-frame9335">
                <span class="frame9396-text21">
                    <span>
                        <span>Belanja</span>
                        <br />
                        <span>Tunai</span>
                    </span>
                </span>
                <span class="frame9396-text26"><span>60,152,996</span></span>
            </div>
        </div>
        <div class="frame9396-frame93972">
            <div class="frame9396-frame9336">
              <div id="chartdiv">
              </div>
              <span class="frame9396-text28"><span>KELULUSAN</span></span>
            </div>
            <div class="frame9396-frame9337">
              <div id="chartdiv2">
              </div>
              <span class="frame9396-text30"><span>KOMITMEN DICAJ</span></span>
            </div>
            <div class="frame9396-frame9338">
              <div id="chartdiv3">
              </div>
              <span class="frame9396-text32"><span>BELANJA TUNAI</span></span>
            </div>
        </div>
    </div>
    <div class="frame9396-frame93973">
        <div class="frame9396-frame93974">
            <div class="frame9396-frame9339">
              <div id="piechartdiv">
              </div>
            </div>
            <div class="frame9396-frame93961">
                <div class="frame9396-frame9341">
                  <div id="sortedbardiv">
                  </div>
                    <div class="frame9396-frame93962">
                        <div class="frame9396-frame9343">
                            <span class="frame9396-text34"><span>57,516</span></span>
                            <span class="frame9396-text36"><span>PENEROKA</span></span>
                        </div>
                    <div class="frame9396-frame9344">
                        <span class="frame9396-text38">
                            <span>236 Rancangan</span>
                        </span>
                    </div>
                    <div class="frame9396-frame9342">
                        <span class="frame9396-text40"><span>8,673</span></span>
                        <span class="frame9396-text42"><span>PROJEK</span></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="frame9396-frame9346">
            <div id="stackbardiv">
            </div>
        </div>
    </div>
    <div class="frame9396-frame93975">
        <div class="frame9396-frame9340">
          <div id="dragbardiv1">
          </div>
        </div>
        <div class="frame9396-frame9345">
          <div id="dragbardiv2">
          </div>
        </div>
        <div class="frame9396-frame9347">
          <div id="clustchartdiv">
          </div>
        </div>
    </div>
  </div>
</div>
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>

<!-- Chart code -->
<script>
am5.ready(function() {

// Create root element
// https://www.amcharts.com/docs/v5/getting-started/#Root_element
var root = am5.Root.new("chartdiv");

// Set themes
// https://www.amcharts.com/docs/v5/concepts/themes/
root.setThemes([
  am5themes_Animated.new(root)
]);

// Create chart
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/
var chart = root.container.children.push(
  am5percent.PieChart.new(root, {
    startAngle: 160, endAngle: 380
  })
);

// Create series
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Series

var series0 = chart.series.push(
  am5percent.PieSeries.new(root, {
    valueField: "litres",
    categoryField: "country",
    startAngle: 160,
    endAngle: 380,
    radius: am5.percent(70),
    innerRadius: am5.percent(65)
  })
);

var colorSet = am5.ColorSet.new(root, {
  colors: [series0.get("colors").getIndex(0)],
  passOptions: {
    lightness: -0.05,
    hue: 0
  }
});

series0.set("colors", colorSet);

series0.ticks.template.set("forceHidden", true);
series0.labels.template.set("forceHidden", true);

var series1 = chart.series.push(
  am5percent.PieSeries.new(root, {
    startAngle: 160,
    endAngle: 380,
    valueField: "bottles",
    innerRadius: am5.percent(80),
    categoryField: "country"
  })
);

series1.ticks.template.set("forceHidden", true);
series1.labels.template.set("forceHidden", true);

var label = chart.seriesContainer.children.push(
  am5.Label.new(root, {
    textAlign: "center",
    centerY: am5.p100,
    centerX: am5.p50,
    text: "[fontSize:18px]total[/]:\n[bold fontSize:20px]1647.9[/]"
  })
);

var data = [
  {
    country: "Lithuania",
    litres: 501.9,
    bottles: 1500
  },
  {
    country: "Czech Republic",
    litres: 301.9,
    bottles: 990
  },
  {
    country: "Ireland",
    litres: 201.1,
    bottles: 785
  },
  {
    country: "Germany",
    litres: 165.8,
    bottles: 255
  },
  {
    country: "Australia",
    litres: 139.9,
    bottles: 452
  },
  {
    country: "Austria",
    litres: 128.3,
    bottles: 332
  },
  {
    country: "UK",
    litres: 99,
    bottles: 150
  },
  {
    country: "Belgium",
    litres: 60,
    bottles: 178
  },
  {
    country: "The Netherlands",
    litres: 50,
    bottles: 50
  }
];

// Set data
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Setting_data
series0.data.setAll(data);
series1.data.setAll(data);

//end for class frame9396-frame9337

var root2 = am5.Root.new("chartdiv2");

// Set themes
// https://www.amcharts.com/docs/v5/concepts/themes/
root2.setThemes([
  am5themes_Animated.new(root2)
]);

// Create chart
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/
var chart2 = root2.container.children.push(
  am5percent.PieChart.new(root2, {
    startAngle: 160, endAngle: 380
  })
);

// Create series
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Series

var series3 = chart2.series.push(
  am5percent.PieSeries.new(root2, {
    valueField: "litres",
    categoryField: "country",
    startAngle: 160,
    endAngle: 380,
    radius: am5.percent(70),
    innerRadius: am5.percent(65)
  })
);

var colorSet2 = am5.ColorSet.new(root2, {
  colors: [series0.get("colors").getIndex(0)],
  passOptions: {
    lightness: -0.05,
    hue: 0
  }
});

series3.set("colors", colorSet);

series3.ticks.template.set("forceHidden", true);
series3.labels.template.set("forceHidden", true);

var series4 = chart2.series.push(
  am5percent.PieSeries.new(root2, {
    startAngle: 160,
    endAngle: 380,
    valueField: "bottles",
    innerRadius: am5.percent(80),
    categoryField: "country"
  })
);

series4.ticks.template.set("forceHidden", true);
series4.labels.template.set("forceHidden", true);

var label2 = chart2.seriesContainer.children.push(
  am5.Label.new(root2, {
    textAlign: "center",
    centerY: am5.p100,
    centerX: am5.p50,
    text: "[fontSize:18px]total[/]:\n[bold fontSize:20px]1647.9[/]"
  })
);

var data2 = [
  {
    country: "Lithuania",
    litres: 501.9,
    bottles: 1500
  },
  {
    country: "Czech Republic",
    litres: 301.9,
    bottles: 990
  },
  {
    country: "Ireland",
    litres: 201.1,
    bottles: 785
  },
  {
    country: "Germany",
    litres: 165.8,
    bottles: 255
  },
  {
    country: "Australia",
    litres: 139.9,
    bottles: 452
  },
  {
    country: "Austria",
    litres: 128.3,
    bottles: 332
  },
  {
    country: "UK",
    litres: 99,
    bottles: 150
  },
  {
    country: "Belgium",
    litres: 60,
    bottles: 178
  },
  {
    country: "The Netherlands",
    litres: 50,
    bottles: 50
  }
];

// Set data
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Setting_data
series3.data.setAll(data2);
series4.data.setAll(data2);

//end for class frame9396-frame9337

var root3 = am5.Root.new("chartdiv3");

// Set themes
// https://www.amcharts.com/docs/v5/concepts/themes/
root3.setThemes([
  am5themes_Animated.new(root3)
]);

// Create chart
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/
var chart3 = root3.container.children.push(
  am5percent.PieChart.new(root3, {
    startAngle: 160, endAngle: 380
  })
);

// Create series
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Series

var series5 = chart3.series.push(
  am5percent.PieSeries.new(root3, {
    valueField: "litres",
    categoryField: "country",
    startAngle: 160,
    endAngle: 380,
    radius: am5.percent(70),
    innerRadius: am5.percent(65)
  })
);

var colorSet3 = am5.ColorSet.new(root3, {
  colors: [series0.get("colors").getIndex(0)],
  passOptions: {
    lightness: -0.05,
    hue: 0
  }
});

series5.set("colors", colorSet);

series5.ticks.template.set("forceHidden", true);
series5.labels.template.set("forceHidden", true);

var series6 = chart3.series.push(
  am5percent.PieSeries.new(root3, {
    startAngle: 160,
    endAngle: 380,
    valueField: "bottles",
    innerRadius: am5.percent(80),
    categoryField: "country"
  })
);

series6.ticks.template.set("forceHidden", true);
series6.labels.template.set("forceHidden", true);

var label3 = chart3.seriesContainer.children.push(
  am5.Label.new(root3, {
    textAlign: "center",
    centerY: am5.p100,
    centerX: am5.p50,
    text: "[fontSize:18px]total[/]:\n[bold fontSize:20px]1647.9[/]"
  })
);

var data3 = [
  {
    country: "Lithuania",
    litres: 501.9,
    bottles: 1500
  },
  {
    country: "Czech Republic",
    litres: 301.9,
    bottles: 990
  },
  {
    country: "Ireland",
    litres: 201.1,
    bottles: 785
  },
  {
    country: "Germany",
    litres: 165.8,
    bottles: 255
  },
  {
    country: "Australia",
    litres: 139.9,
    bottles: 452
  },
  {
    country: "Austria",
    litres: 128.3,
    bottles: 332
  },
  {
    country: "UK",
    litres: 99,
    bottles: 150
  },
  {
    country: "Belgium",
    litres: 60,
    bottles: 178
  },
  {
    country: "The Netherlands",
    litres: 50,
    bottles: 50
  }
];

// Set data
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Setting_data
series5.data.setAll(data3);
series6.data.setAll(data3);

}); // end am5.ready()
</script>

<script>
  am5.ready(function() {
  
  // Create root element
  // https://www.amcharts.com/docs/v5/getting-started/#Root_element
  var pieroot = am5.Root.new("piechartdiv");
  
  
  // Set themes
  // https://www.amcharts.com/docs/v5/concepts/themes/
  pieroot.setThemes([
    am5themes_Animated.new(pieroot)
  ]);
  
  
  // Create chart
  // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/
  var piechart = pieroot.container.children.push(am5percent.PieChart.new(pieroot, {
    layout: pieroot.verticalLayout
  }));
  
  
  // Create series
  // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Series
  var pieseries = piechart.series.push(am5percent.PieSeries.new(pieroot, {
    alignLabels: true,
    calculateAggregates: true,
    valueField: "value",
    categoryField: "category"
  }));
  
  pieseries.slices.template.setAll({
    strokeWidth: 3,
    stroke: am5.color(0xffffff)
  });
  
  pieseries.labelsContainer.set("paddingTop", 30)
  
  
  // Set up adapters for variable slice radius
  // https://www.amcharts.com/docs/v5/concepts/settings/adapters/
  pieseries.slices.template.adapters.add("radius", function (radius, target) {
    var dataItem = target.dataItem;
    var high = pieseries.getPrivate("valueHigh");
  
    if (dataItem) {
      var value = target.dataItem.get("valueWorking", 0);
      return radius * value / high
    }
    return radius;
  });
  
  
  // Set data
  // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Setting_data
  pieseries.data.setAll([{
    value: 10,
    category: "One"
  }, {
    value: 9,
    category: "Two"
  }, {
    value: 6,
    category: "Three"
  }, {
    value: 5,
    category: "Four"
  }, {
    value: 4,
    category: "Five"
  }, {
    value: 3,
    category: "Six"
  }]);
  
  
  // Create legend
  // https://www.amcharts.com/docs/v5/charts/percent-charts/legend-percent-series/
  var pielegend = piechart.children.push(am5.Legend.new(pieroot, {
    centerX: am5.p50,
    x: am5.p50,
    marginTop: 15,
    marginBottom: 15
  }));
  
  pielegend.data.setAll(pieseries.dataItems);
  
  
  // Play initial series animation
  // https://www.amcharts.com/docs/v5/concepts/animations/#Animation_of_series
  pieseries.appear(1000, 100);
  
  }); // end am5.ready()
  </script>

  <script>
    am5.ready(function() {
    
    // Create root element
    // https://www.amcharts.com/docs/v5/getting-started/#Root_element
    var sortedroot = am5.Root.new("sortedbardiv");
    
    
    // Set themes
    // https://www.amcharts.com/docs/v5/concepts/themes/
    sortedroot.setThemes([
      am5themes_Animated.new(sortedroot)
    ]);
    
    
    // Create chart
    // https://www.amcharts.com/docs/v5/charts/xy-chart/
    var sortedchart = sortedroot.container.children.push(am5xy.XYChart.new(sortedroot, {
      panX: false,
      panY: false,
      wheelX: "none",
      wheelY: "none"
    }));
    
    // We don't want zoom-out button to appear while animating, so we hide it
    sortedchart.zoomOutButton.set("forceHidden", true);
    
    
    // Create axes
    // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
    var yRenderer = am5xy.AxisRendererY.new(sortedroot, {
      minGridDistance: 30
    });
    
    var yAxis = sortedchart.yAxes.push(am5xy.CategoryAxis.new(sortedroot, {
      maxDeviation: 0,
      categoryField: "network",
      renderer: yRenderer,
      tooltip: am5.Tooltip.new(sortedroot, { themeTags: ["axis"] })
    }));
    
    var xAxis = sortedchart.xAxes.push(am5xy.ValueAxis.new(sortedroot, {
      maxDeviation: 0,
      min: 0,
      extraMax:0.1,
      renderer: am5xy.AxisRendererX.new(sortedroot, {})
    }));
    
    
    // Add series
    // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
    var sortedseries = sortedchart.series.push(am5xy.ColumnSeries.new(sortedroot, {
      name: "Series 1",
      xAxis: xAxis,
      yAxis: yAxis,
      valueXField: "value",
      categoryYField: "network",
      tooltip: am5.Tooltip.new(sortedroot, {
        pointerOrientation: "left",
        labelText: "{valueX}"
      })
    }));
    
    
    // Rounded corners for columns
    sortedseries.columns.template.setAll({
      cornerRadiusTR: 5,
      cornerRadiusBR: 5
    });
    
    // Make each column to be of a different color
    sortedseries.columns.template.adapters.add("fill", function(fill, target) {
      return sortedchart.get("colors").getIndex(sortedseries.columns.indexOf(target));
    });
    
    sortedseries.columns.template.adapters.add("stroke", function(stroke, target) {
      return sortedchart.get("colors").getIndex(sortedseries.columns.indexOf(target));
    });
    
    
    // Set data
    var sorteddata = [
      {
        "network": "Facebook",
        "value": 2255250000
      },
      {
        "network": "Google+",
        "value": 430000000
      },
      {
        "network": "Instagram",
        "value": 1000000000
      },
      {
        "network": "Pinterest",
        "value": 246500000
      },
      {
        "network": "Reddit",
        "value": 355000000
      },
      {
        "network": "TikTok",
        "value": 500000000
      },
      {
        "network": "Tumblr",
        "value": 624000000
      },
      {
        "network": "Twitter",
        "value": 329500000
      },
      {
        "network": "WeChat",
        "value": 1000000000
      },
      {
        "network": "Weibo",
        "value": 431000000
      },
      {
        "network": "Whatsapp",
        "value": 1433333333
      },
      {
        "network": "YouTube",
        "value": 1900000000
      }
    ];
    
    yAxis.data.setAll(sorteddata);
    sortedseries.data.setAll(sorteddata);
    sortCategoryAxis();
    
    // Get series item by category
    function getSeriesItem(category) {
      for (var i = 0; i < sortedseries.dataItems.length; i++) {
        var sorteddataItem = sortedseries.dataItems[i];
        if (sorteddataItem.get("categoryY") == category) {
          return sorteddataItem;
        }
      }
    }
    
    sortedchart.set("cursor", am5xy.XYCursor.new(sortedroot, {
      behavior: "none",
      xAxis: xAxis,
      yAxis: yAxis
    }));
    
    
    // Axis sorting
    function sortCategoryAxis() {
    
      // Sort by value
      sortedseries.dataItems.sort(function(x, y) {
        return x.get("valueX") - y.get("valueX"); // descending
        //return y.get("valueY") - x.get("valueX"); // ascending
      })
    
      // Go through each axis item
      am5.array.each(yAxis.dataItems, function(dataItem) {
        // get corresponding series item
        var seriesDataItem = getSeriesItem(dataItem.get("category"));
    
        if (seriesDataItem) {
          // get index of series data item
          var index = sortedseries.dataItems.indexOf(seriesDataItem);
          // calculate delta position
          var deltaPosition = (index - dataItem.get("index", 0)) / sortedseries.dataItems.length;
          // set index to be the same as series data item index
          dataItem.set("index", index);
          // set deltaPosition instanlty
          dataItem.set("deltaPosition", -deltaPosition);
          // animate delta position to 0
          dataItem.animate({
            key: "deltaPosition",
            to: 0,
            duration: 1000,
            easing: am5.ease.out(am5.ease.cubic)
          })
        }
      });
    
      // Sort axis items by index.
      // This changes the order instantly, but as deltaPosition is set,
      // they keep in the same places and then animate to true positions.
      yAxis.dataItems.sort(function(x, y) {
        return x.get("index") - y.get("index");
      });
    }
    
    
    // update data with random values each 1.5 sec
    setInterval(function () {
      updateData();
    }, 1500)
    
    function updateData() {
      am5.array.each(sortedseries.dataItems, function (dataItem) {
        var value = dataItem.get("valueX") + Math.round(Math.random() * 1000000000 - 500000000);
        if (value < 0) {
          value = 500000000;
        }
        // both valueY and workingValueY should be changed, we only animate workingValueY
        dataItem.set("valueX", value);
        dataItem.animate({
          key: "valueXWorking",
          to: value,
          duration: 600,
          easing: am5.ease.out(am5.ease.cubic)
        });
      })
    
      sortCategoryAxis();
    }
    
    
    // Make stuff animate on load
    // https://www.amcharts.com/docs/v5/concepts/animations/
    sortedseries.appear(1000);
    sortedchart.appear(1000, 100);
    
    }); // end am5.ready()
    </script>
    
    <script>
      am5.ready(function() {
      
      // Create root element
      // https://www.amcharts.com/docs/v5/getting-started/#Root_element
      var stackroot = am5.Root.new("stackbardiv");
      
      
      // Set themes
      // https://www.amcharts.com/docs/v5/concepts/themes/
      stackroot.setThemes([
        am5themes_Animated.new(stackroot)
      ]);
      
      
      // Create chart
      // https://www.amcharts.com/docs/v5/charts/xy-chart/
      var stackchart = stackroot.container.children.push(am5xy.XYChart.new(stackroot, {
        panX: false,
        panY: false,
        wheelX: "panY",
        wheelY: "zoomY",
        layout: stackroot.verticalLayout
      }));
      
      // Add scrollbar
      // https://www.amcharts.com/docs/v5/charts/xy-chart/scrollbars/
      stackchart.set("scrollbarY", am5.Scrollbar.new(stackroot, {
        orientation: "vertical"
      }));
      
      var stackdata = [{
        "year": "2021",
        "europe": 2.5,
        "namerica": 2.5,
        "asia": 2.1,
        "lamerica": 1,
        "meast": 0.8,
        "africa": 0.4
      }, {
        "year": "2022",
        "europe": 2.6,
        "namerica": 2.7,
        "asia": 2.2,
        "lamerica": 0.5,
        "meast": 0.4,
        "africa": 0.3
      }, {
        "year": "2023",
        "europe": 2.8,
        "namerica": 2.9,
        "asia": 2.4,
        "lamerica": 0.3,
        "meast": 0.9,
        "africa": 0.5
      }]
      
      
      // Create axes
      // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
      var yAxistack = stackchart.yAxes.push(am5xy.CategoryAxis.new(stackroot, {
        categoryField: "year",
        renderer: am5xy.AxisRendererY.new(stackroot, {}),
        tooltip: am5.Tooltip.new(stackroot, {})
      }));
      
      yAxistack.data.setAll(stackdata);
      
      var xAxistack = stackchart.xAxes.push(am5xy.ValueAxis.new(stackroot, {
        min: 0,
        renderer: am5xy.AxisRendererX.new(stackroot, {})
      }));
      
      
      // Add legend
      // https://www.amcharts.com/docs/v5/charts/xy-chart/legend-xy-series/
      var stacklegend = stackchart.children.push(am5.Legend.new(stackroot, {
        centerX: am5.p50,
        x: am5.p50
      }));
      
      
      // Add series
      // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
      function makeSeries(name, fieldName) {
        var stackseries = stackchart.series.push(am5xy.ColumnSeries.new(stackroot, {
          name: name,
          stacked: true,
          xAxis: xAxistack,
          yAxis: yAxistack,
          baseAxis: yAxistack,
          valueXField: fieldName,
          categoryYField: "year"
        }));
      
        stackseries.columns.template.setAll({
          tooltipText: "{name}, {categoryY}: {valueX}",
          tooltipY: am5.percent(90)
        });
        stackseries.data.setAll(stackdata);
      
        // Make stuff animate on load
        // https://www.amcharts.com/docs/v5/concepts/animations/
        stackseries.appear();
      
        stackseries.bullets.push(function () {
          return am5.Bullet.new(stackroot, {
            sprite: am5.Label.new(stackroot, {
              text: "{valueX}",
              fill: stackroot.interfaceColors.get("alternativeText"),
              centerY: am5.p50,
              centerX: am5.p50,
              populateText: true
            })
          });
        });
      
        stacklegend.data.push(stackseries);
      }
      
      makeSeries("Europe", "europe");
      makeSeries("North America", "namerica");
      makeSeries("Asia", "asia");
      makeSeries("Latin America", "lamerica");
      makeSeries("Middle East", "meast");
      makeSeries("Africa", "africa");
      
      
      // Make stuff animate on load
      // https://www.amcharts.com/docs/v5/concepts/animations/
      stackchart.appear(1000, 100);
      
      }); // end am5.ready()
      </script>

    <script>
      am5.ready(function() {
      
      // Create root element
      // https://www.amcharts.com/docs/v5/getting-started/#Root_element
      var dragbarroot = am5.Root.new("dragbardiv1");
      
      
      // Set themes
      // https://www.amcharts.com/docs/v5/concepts/themes/
      dragbarroot.setThemes([am5themes_Animated.new(dragbarroot)]);
      
      
      // Create chart
      // https://www.amcharts.com/docs/v5/charts/xy-chart/
      var dragbarchart = dragbarroot.container.children.push(
        am5xy.XYChart.new(dragbarroot, {
          panX: false,
          panY: false,
          wheelX: "none",
          wheelY: "none"
        })
      );
      
      
      // Create axes
      // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
      var yRenderer = am5xy.AxisRendererY.new(dragbarroot, { minGridDistance: 30 });
      
      var yAxisdragbar = dragbarchart.yAxes.push(
        am5xy.CategoryAxis.new(dragbarroot, {
          maxDeviation: 0,
          categoryField: "country",
          renderer: yRenderer
        })
      );
      
      var xAxisdragbar = dragbarchart.xAxes.push(
        am5xy.ValueAxis.new(dragbarroot, {
          maxDeviation: 0,
          min: 0,
          renderer: am5xy.AxisRendererX.new(dragbarroot, {})
        })
      );
      
      
      // Create series
      // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
      var dragbarseries = dragbarchart.series.push(
        am5xy.ColumnSeries.new(dragbarroot, {
          name: "Series 1",
          xAxis: xAxisdragbar,
          yAxis: yAxisdragbar,
          valueXField: "value",
          sequencedInterpolation: true,
          categoryYField: "country"
        })
      );
      
      var columnTemplate = dragbarseries.columns.template;
      
      columnTemplate.setAll({
        draggable: true,
        cursorOverStyle: "pointer",
        tooltipText: "drag to rearrange",
        cornerRadiusBR: 10,
        cornerRadiusTR: 10
      });
      columnTemplate.adapters.add("fill", (fill, target) => {
        return dragbarchart.get("colors").getIndex(dragbarseries.columns.indexOf(target));
      });
      
      columnTemplate.adapters.add("stroke", (stroke, target) => {
        return dragbarchart.get("colors").getIndex(dragbarseries.columns.indexOf(target));
      });
      
      columnTemplate.events.on("dragstop", () => {
        sortCategoryAxis();
      });
      
      // Get series item by category
      function getSeriesItem(category) {
        for (var i = 0; i < dragbarseries.dataItems.length; i++) {
          var dataItem = dragbarseries.dataItems[i];
          if (dataItem.get("categoryY") == category) {
            return dataItem;
          }
        }
      }
      
      
      // Axis sorting
      function sortCategoryAxis() {
        // Sort by value
        dragbarseries.dataItems.sort(function (x, y) {
          return y.get("graphics").y() - x.get("graphics").y();
        });
      
        var easing = am5.ease.out(am5.ease.cubic);
      
        // Go through each axis item
        am5.array.each(yAxis.dataItems, function (dataItem) {
          // get corresponding series item
          var seriesDataItem = getSeriesItem(dataItem.get("category"));
      
          if (seriesDataItem) {
            // get index of series data item
            var index = dragbarseries.dataItems.indexOf(seriesDataItem);
      
            var column = seriesDataItem.get("graphics");
      
            // position after sorting
            var fy =
              yRenderer.positionToCoordinate(yAxisdragbar.indexToPosition(index)) -
              column.height() / 2;
      
            // set index to be the same as series data item index
            if (index != dataItem.get("index")) {
              dataItem.set("index", index);
      
              // current position
              var x = column.x();
              var y = column.y();
      
              column.set("dy", -(fy - y));
              column.set("dx", x);
      
              column.animate({ key: "dy", to: 0, duration: 600, easing: easing });
              column.animate({ key: "dx", to: 0, duration: 600, easing: easing });
            } else {
              column.animate({ key: "y", to: fy, duration: 600, easing: easing });
              column.animate({ key: "x", to: 0, duration: 600, easing: easing });
            }
          }
        });
      
        // Sort axis items by index.
        // This changes the order instantly, but as dx and dy is set and animated,
        // they keep in the same places and then animate to true positions.
        yAxisdragbar.dataItems.sort(function (x, y) {
          return x.get("index") - y.get("index");
        });
      }
      
      // Set data
      var data = [{
        country: "USA",
        value: 2025
      }, {
        country: "China",
        value: 1882
      }, {
        country: "Japan",
        value: 1809
      }, {
        country: "Germany",
        value: 1322
      }, {
        country: "UK",
        value: 1122
      }];
      
      yAxisdragbar.data.setAll(data);
      dragbarseries.data.setAll(data);
      
      
      // Make stuff animate on load
      // https://www.amcharts.com/docs/v5/concepts/animations/
      dragbarseries.appear(1000);
      dragbarchart.appear(1000, 100);
      
      }); // end am5.ready()
    </script>

    <script>
      am5.ready(function() {
      
      // Create root element
      // https://www.amcharts.com/docs/v5/getting-started/#Root_element
      var dragbarroot2 = am5.Root.new("dragbardiv2");
      
      
      // Set themes
      // https://www.amcharts.com/docs/v5/concepts/themes/
      dragbarroot2.setThemes([am5themes_Animated.new(dragbarroot2)]);
      
      
      // Create chart
      // https://www.amcharts.com/docs/v5/charts/xy-chart/
      var dragbarchart2 = dragbarroot2.container.children.push(
        am5xy.XYChart.new(dragbarroot2, {
          panX: false,
          panY: false,
          wheelX: "none",
          wheelY: "none"
        })
      );
      
      
      // Create axes
      // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
      var yRenderer2 = am5xy.AxisRendererY.new(dragbarroot2, { minGridDistance: 30 });
      
      var yAxisdragbar2 = dragbarchart2.yAxes.push(
        am5xy.CategoryAxis.new(dragbarroot2, {
          maxDeviation: 0,
          categoryField: "country",
          renderer: yRenderer2
        })
      );
      
      var xAxisdragbar2 = dragbarchart2.xAxes.push(
        am5xy.ValueAxis.new(dragbarroot2, {
          maxDeviation: 0,
          min: 0,
          renderer: am5xy.AxisRendererX.new(dragbarroot2, {})
        })
      );
      
      
      // Create series
      // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
      var dragbarseries2 = dragbarchart2.series.push(
        am5xy.ColumnSeries.new(dragbarroot2, {
          name: "Series 1",
          xAxis: xAxisdragbar2,
          yAxis: yAxisdragbar2,
          valueXField: "value",
          sequencedInterpolation: true,
          categoryYField: "country"
        })
      );
      
      var columnTemplate2 = dragbarseries2.columns.template;
      
      columnTemplate2.setAll({
        draggable: true,
        cursorOverStyle: "pointer",
        tooltipText: "drag to rearrange",
        cornerRadiusBR: 10,
        cornerRadiusTR: 10
      });
      columnTemplate2.adapters.add("fill", (fill, target) => {
        return dragbarchart2.get("colors").getIndex(dragbarseries2.columns.indexOf(target));
      });
      
      columnTemplate2.adapters.add("stroke", (stroke, target) => {
        return dragbarchart2.get("colors").getIndex(dragbarseries2.columns.indexOf(target));
      });
      
      columnTemplate2.events.on("dragstop", () => {
        sortCategoryAxis();
      });
      
      // Get series item by category
      function getSeriesItem(category) {
        for (var i = 0; i < dragbarseries2.dataItems.length; i++) {
          var dataItem2 = dragbarseries2.dataItems[i];
          if (dataItem2.get("categoryY") == category) {
            return dataItem2;
          }
        }
      }
      
      
      // Axis sorting
      function sortCategoryAxis() {
        // Sort by value
        dragbarseries2.dataItems.sort(function (x, y) {
          return y.get("graphics").y() - x.get("graphics").y();
        });
      
        var easing2 = am5.ease.out(am5.ease.cubic);
      
        // Go through each axis item
        am5.array.each(yAxis.dataItems, function (dataItem) {
          // get corresponding series item
          var seriesDataItem = getSeriesItem(dataItem.get("category"));
      
          if (seriesDataItem) {
            // get index of series data item
            var index = dragbarseries.dataItems.indexOf(seriesDataItem);
      
            var column = seriesDataItem.get("graphics");
      
            // position after sorting
            var fy =
              yRenderer.positionToCoordinate(yAxisdragbar.indexToPosition(index)) -
              column.height() / 2;
      
            // set index to be the same as series data item index
            if (index != dataItem.get("index")) {
              dataItem.set("index", index);
      
              // current position
              var x = column.x();
              var y = column.y();
      
              column.set("dy", -(fy - y));
              column.set("dx", x);
      
              column.animate({ key: "dy", to: 0, duration: 600, easing: easing });
              column.animate({ key: "dx", to: 0, duration: 600, easing: easing });
            } else {
              column.animate({ key: "y", to: fy, duration: 600, easing: easing });
              column.animate({ key: "x", to: 0, duration: 600, easing: easing });
            }
          }
        });
      
        // Sort axis items by index.
        // This changes the order instantly, but as dx and dy is set and animated,
        // they keep in the same places and then animate to true positions.
        yAxisdragbar2.dataItems.sort(function (x, y) {
          return x.get("index") - y.get("index");
        });
      }
      
      // Set data
      var data2 = [{
        country: "USA",
        value: 2025
      }, {
        country: "China",
        value: 1882
      }, {
        country: "Japan",
        value: 1809
      }, {
        country: "Germany",
        value: 1322
      }, {
        country: "UK",
        value: 1122
      }];
      
      yAxisdragbar2.data.setAll(data2);
      dragbarseries2.data.setAll(data2);
      
      
      // Make stuff animate on load
      // https://www.amcharts.com/docs/v5/concepts/animations/
      dragbarseries2.appear(1000);
      dragbarchart2.appear(1000, 100);
      
      }); // end am5.ready()
      </script>

      <script>
        am5.ready(function() {
        
        // Create root element
        // https://www.amcharts.com/docs/v5/getting-started/#Root_element
        var clustroot = am5.Root.new("clustchartdiv");
        
        
        // Set themes
        // https://www.amcharts.com/docs/v5/concepts/themes/
        clustroot.setThemes([
          am5themes_Animated.new(clustroot)
        ]);
        
        
        // Create chart
        // https://www.amcharts.com/docs/v5/charts/xy-chart/
        var clustchart = clustroot.container.children.push(am5xy.XYChart.new(clustroot, {
          panX: false,
          panY: false,
          wheelX: "panX",
          wheelY: "zoomX",
          layout: clustroot.verticalLayout
        }));
        
        
        // Add legend
        // https://www.amcharts.com/docs/v5/charts/xy-chart/legend-xy-series/
        var clustlegend = clustchart.children.push(
          am5.Legend.new(clustroot, {
            centerX: am5.p50,
            x: am5.p50
          })
        );
        
        var clustdata = [{
          "year": "2021",
          "europe": 2.5,
          "namerica": 2.5,
          "asia": 2.1,
          "lamerica": 1,
          "meast": 0.8,
          "africa": 0.4
        }, {
          "year": "2022",
          "europe": 2.6,
          "namerica": 2.7,
          "asia": 2.2,
          "lamerica": 0.5,
          "meast": 0.4,
          "africa": 0.3
        }, {
          "year": "2023",
          "europe": 2.8,
          "namerica": 2.9,
          "asia": 2.4,
          "lamerica": 0.3,
          "meast": 0.9,
          "africa": 0.5
        }]
        
        
        // Create axes
        // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
        var xAxisclust = clustchart.xAxes.push(am5xy.CategoryAxis.new(clustroot, {
          categoryField: "year",
          renderer: am5xy.AxisRendererX.new(clustroot, {
            cellStartLocation: 0.1,
            cellEndLocation: 0.9
          }),
          tooltip: am5.Tooltip.new(clustroot, {})
        }));
        
        xAxisclust.data.setAll(clustdata);
        
        var yAxisclust = clustchart.yAxes.push(am5xy.ValueAxis.new(clustroot, {
          renderer: am5xy.AxisRendererY.new(clustroot, {})
        }));
        
        
        // Add series
        // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
        function makeSeries(name, fieldName) {
          var clustseries = clustchart.series.push(am5xy.ColumnSeries.new(clustroot, {
            name: name,
            xAxis: xAxisclust,
            yAxis: yAxisclust,
            valueYField: fieldName,
            categoryXField: "year"
          }));
        
          clustseries.columns.template.setAll({
            tooltipText: "{name}, {categoryX}:{valueY}",
            width: am5.percent(90),
            tooltipY: 0
          });
        
          clustseries.data.setAll(clustdata);
        
          // Make stuff animate on load
          // https://www.amcharts.com/docs/v5/concepts/animations/
          clustseries.appear();
        
          clustseries.bullets.push(function () {
            return am5.Bullet.new(clustroot, {
              locationY: 0,
              sprite: am5.Label.new(clustroot, {
                text: "{valueY}",
                fill: clustroot.interfaceColors.get("alternativeText"),
                centerY: 0,
                centerX: am5.p50,
                populateText: true
              })
            });
          });
        
          clustlegend.data.push(clustseries);
        }
        
        makeSeries("Europe", "europe");
        makeSeries("North America", "namerica");
        makeSeries("Asia", "asia");
        makeSeries("Latin America", "lamerica");
        makeSeries("Middle East", "meast");
        makeSeries("Africa", "africa");
        
        
        // Make stuff animate on load
        // https://www.amcharts.com/docs/v5/concepts/animations/
        clustchart.appear(1000, 100);
        
        }); // end am5.ready()
        </script>
  
      
@endsection