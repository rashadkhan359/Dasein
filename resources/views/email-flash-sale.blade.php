@extends('layouts.master-without-nav')
@section('title') Faqs @endsection
@section('css')
    <!-- extra css -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
@endsection
@section('content')
    <section style="font-family: 'Inter', sans-serif; box-sizing: border-box; font-size: 15px; width: 100%; background-color: transparent; margin: 35px 0;color: #06283D;">
            <div style="max-width: 600px;margin:auto; box-shadow: rgba(135, 138, 153, 0.10) 0 5px 20px -6px;border-radius: 6px;overflow: hidden;background-color: #438eff;position: relative;">
                <div style="padding: 24px; text-align:center; font-weight: 600;z-index: 1;position: relative; background-color: #0d355d; color: #fff; ">It's our biggest sale of the year</div>
                <div style="padding: 4.5rem 3.5rem 3.5rem;z-index: 1;position: relative;">
                    <div style="position: absolute;inset:0;opacity: 0.5;">
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="1440" height="640" preserveAspectRatio="none" viewBox="0 0 1440 640">
                            <g mask="url(&quot;#SvgjsMask1136&quot;)" fill="none">
                                <use xlink:href="#SvgjsSymbol1143" x="0" y="0"></use>
                                <use xlink:href="#SvgjsSymbol1143" x="720" y="0"></use>
                            </g>
                            <defs>
                                <mask id="SvgjsMask1136">
                                    <rect width="1440" height="640" fill="#ffffff"></rect>
                                </mask>
                                <path d="M-1 0 a1 1 0 1 0 2 0 a1 1 0 1 0 -2 0z" id="SvgjsPath1141"></path>
                                <path d="M-3 0 a3 3 0 1 0 6 0 a3 3 0 1 0 -6 0z" id="SvgjsPath1137"></path>
                                <path d="M-5 0 a5 5 0 1 0 10 0 a5 5 0 1 0 -10 0z" id="SvgjsPath1139"></path>
                                <path d="M2 -2 L-2 2z" id="SvgjsPath1140"></path>
                                <path d="M6 -6 L-6 6z" id="SvgjsPath1138"></path>
                                <path d="M30 -30 L-30 30z" id="SvgjsPath1142"></path>
                            </defs>
                            <symbol id="SvgjsSymbol1143">
                                <use xlink:href="#SvgjsPath1137" x="30" y="30" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="30" y="90" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="30" y="150" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1137" x="30" y="210" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1139" x="30" y="270" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="30" y="330" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="30" y="390" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="30" y="450" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1139" x="30" y="510" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="30" y="570" stroke="rgba(255, 255, 255, 0.4)"></use>

                                <use xlink:href="#SvgjsPath1140" x="90" y="30" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1140" x="90" y="90" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1137" x="90" y="150" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1139" x="90" y="210" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1141" x="90" y="270" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1140" x="90" y="330" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="90" y="390" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1139" x="90" y="450" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="90" y="510" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1141" x="90" y="570" stroke="rgba(255, 255, 255, 0.4)"></use>

                                <use xlink:href="#SvgjsPath1142" x="150" y="30" stroke="rgba(255, 255, 255, 0.4)" stroke-width="3"></use>
                                <use xlink:href="#SvgjsPath1137" x="150" y="90" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="150" y="150" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1139" x="150" y="210" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1140" x="150" y="270" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="150" y="330" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="150" y="390" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1139" x="150" y="450" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="150" y="510" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1139" x="150" y="570" stroke="rgba(255, 255, 255, 0.4)"></use>

                                <use xlink:href="#SvgjsPath1138" x="210" y="30" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="210" y="90" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1141" x="210" y="150" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1139" x="210" y="210" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1137" x="210" y="270" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1137" x="210" y="330" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1139" x="210" y="390" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1142" x="210" y="450" stroke="rgba(255, 255, 255, 0.4)" stroke-width="3"></use>
                                <use xlink:href="#SvgjsPath1138" x="210" y="510" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="210" y="570" stroke="rgba(255, 255, 255, 0.4)"></use>

                                <use xlink:href="#SvgjsPath1139" x="270" y="30" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="270" y="90" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="270" y="150" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="270" y="210" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1139" x="270" y="270" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1139" x="270" y="330" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1141" x="270" y="390" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="270" y="450" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1139" x="270" y="510" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1139" x="270" y="570" stroke="rgba(255, 255, 255, 0.4)"></use>

                                <use xlink:href="#SvgjsPath1139" x="330" y="30" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="330" y="90" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="330" y="150" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1139" x="330" y="210" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="330" y="270" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1140" x="330" y="330" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="330" y="390" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="330" y="450" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="330" y="510" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="330" y="570" stroke="rgba(255, 255, 255, 0.4)"></use>

                                <use xlink:href="#SvgjsPath1138" x="390" y="30" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="390" y="90" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1139" x="390" y="150" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1137" x="390" y="210" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="390" y="270" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="390" y="330" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1137" x="390" y="390" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1139" x="390" y="450" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1139" x="390" y="510" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1140" x="390" y="570" stroke="rgba(255, 255, 255, 0.4)"></use>

                                <use xlink:href="#SvgjsPath1137" x="450" y="30" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="450" y="90" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1141" x="450" y="150" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="450" y="210" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1140" x="450" y="270" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1141" x="450" y="330" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1141" x="450" y="390" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1137" x="450" y="450" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="450" y="510" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1139" x="450" y="570" stroke="rgba(255, 255, 255, 0.4)"></use>

                                <use xlink:href="#SvgjsPath1138" x="510" y="30" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1139" x="510" y="90" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1139" x="510" y="150" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1139" x="510" y="210" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="510" y="270" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="510" y="330" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="510" y="390" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1137" x="510" y="450" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1141" x="510" y="510" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1140" x="510" y="570" stroke="rgba(255, 255, 255, 0.4)"></use>

                                <use xlink:href="#SvgjsPath1139" x="570" y="30" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="570" y="90" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1139" x="570" y="150" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1139" x="570" y="210" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1139" x="570" y="270" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="570" y="330" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="570" y="390" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1137" x="570" y="450" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1139" x="570" y="510" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1139" x="570" y="570" stroke="rgba(255, 255, 255, 0.4)"></use>

                                <use xlink:href="#SvgjsPath1140" x="630" y="30" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1137" x="630" y="90" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1141" x="630" y="150" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="630" y="210" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1140" x="630" y="270" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1139" x="630" y="330" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="630" y="390" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1139" x="630" y="450" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1139" x="630" y="510" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="630" y="570" stroke="rgba(255, 255, 255, 0.4)"></use>
                                
                                <use xlink:href="#SvgjsPath1139" x="690" y="30" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1139" x="690" y="90" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1139" x="690" y="150" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1141" x="690" y="210" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="690" y="270" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1139" x="690" y="330" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1139" x="690" y="390" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="690" y="450" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="690" y="510" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1142" x="690" y="570" stroke="rgba(255, 255, 255, 0.4)" stroke-width="3"></use>
                            </symbol>
                        </svg>
                    </div>
                    <div style="position: relative; padding:24px;background-image: url('build/images/ecommerce/img-2.jpg');background-size: cover;background-position: center; border-radius: 8px;">
                        <div style="position:absolute; top:0; bottom:0; left:0; right:0; background-color: rgba(255, 255, 255, .75); border-radius: 8px;"></div>
                        <div style="position: relative">
                            <div style="text-align: center;">
                                <h5 style="color: #0d355d !important;font-size: 64px;font-family: 'Inter', sans-serif;font-weight: 600;text-transform: uppercase;margin-bottom: 18px;margin-top: -60px;line-height: 1.2;">Sale</h5>
                                <h5 style="color:#0d355d !important;font-size: 24px;font-family: 'Inter', sans-serif;font-weight: 600;margin-bottom: 18px;margin: 0px;line-height: 1.2;">Up to</h5>
                                <h5 style="color:#438eff !important;font-size: 45px;font-family: 'Inter', sans-serif;font-weight: 600;text-transform: uppercase;margin-bottom: 18px;margin-top: 0px;line-height: 1.2;"><span style="font-size: 120px;">50</span> <span style="width: 20px;display: inline-block;">% Off</span></h5>
                                <p style="color: #0d355d !important; margin-bottom: 25px;margin-top: 0px;line-height: 1.5;">A flash sale is a discount or promotion offered for a limited period of time.</p>
                            </div>
                            <div>
                                <h5 style="color:#0d355d !important;font-size: 18px;font-family: 'Inter', sans-serif;font-weight: 600;margin-bottom: 10px;margin-top: 0px;line-height: 1.2;text-align: center;">Additional 50% Off</h5>
                                <p style="color: #0d355d !important; margin-bottom: 25px;margin-top: 0px;line-height: 1.5;text-align: center;">On Clothes for kids,women & Mens Wear</p>
                                
        
                                <div style="text-align: center;margin-top: 25px;">
                                    <button type="button" style="display: inline-block;padding: 12px 24px;font-size: 14px;font-weight: 400;border-radius: 6px;background-color: #0d355d;color:#fff; border:none ;box-shadow: none;cursor: pointer;text-align: center;box-sizing: border-box;width: 250px;">Shop Now</button>
                                    <p style="color:#0d355d;margin: 8px 0 0 0;font-size: 13px;">Use code <b>FLASH50</b> at checkout</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section style="font-family: 'Inter', sans-serif; box-sizing: border-box; font-size: 15px; width: 100%; background-color: transparent; margin: 35px 0;color: #06283D;">
            <div style="max-width: 600px;margin:auto; box-shadow: rgba(135, 138, 153, 0.10) 0 5px 20px -6px;border-radius: 6px;overflow: hidden;background-color: #0d355d;position: relative;">
                <div style="padding: 24px; text-align:center; font-weight: 600;z-index: 1;position: relative; background-color: #103d6a; color: #fff; ">It's our biggest sale of the year</div>
                <div style="padding: 4.5rem 3.5rem 3.5rem;z-index: 1;position: relative;">
                    <div style="position: absolute;inset:0;opacity: 0.25;">
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="1440" height="640" preserveAspectRatio="none" viewBox="0 0 1440 640">
                            <g mask="url(&quot;#SvgjsMask1136&quot;)" fill="none">
                                <use xlink:href="#SvgjsSymbol1143" x="0" y="0"></use>
                                <use xlink:href="#SvgjsSymbol1143" x="720" y="0"></use>
                            </g>
                            <defs>
                                <mask id="SvgjsMask1136">
                                    <rect width="1440" height="640" fill="#ffffff"></rect>
                                </mask>
                                <path d="M-1 0 a1 1 0 1 0 2 0 a1 1 0 1 0 -2 0z" id="SvgjsPath1141"></path>
                                <path d="M-3 0 a3 3 0 1 0 6 0 a3 3 0 1 0 -6 0z" id="SvgjsPath1137"></path>
                                <path d="M-5 0 a5 5 0 1 0 10 0 a5 5 0 1 0 -10 0z" id="SvgjsPath1139"></path>
                                <path d="M2 -2 L-2 2z" id="SvgjsPath1140"></path>
                                <path d="M6 -6 L-6 6z" id="SvgjsPath1138"></path>
                                <path d="M30 -30 L-30 30z" id="SvgjsPath1142"></path>
                            </defs>
                            <symbol id="SvgjsSymbol1143">
                                <use xlink:href="#SvgjsPath1137" x="30" y="30" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="30" y="90" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="30" y="150" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1137" x="30" y="210" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1139" x="30" y="270" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="30" y="330" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="30" y="390" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="30" y="450" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1139" x="30" y="510" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="30" y="570" stroke="rgba(255, 255, 255, 0.4)"></use>

                                <use xlink:href="#SvgjsPath1140" x="90" y="30" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1140" x="90" y="90" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1137" x="90" y="150" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1139" x="90" y="210" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1141" x="90" y="270" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1140" x="90" y="330" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="90" y="390" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1139" x="90" y="450" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="90" y="510" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1141" x="90" y="570" stroke="rgba(255, 255, 255, 0.4)"></use>

                                <use xlink:href="#SvgjsPath1142" x="150" y="30" stroke="rgba(255, 255, 255, 0.4)" stroke-width="3"></use>
                                <use xlink:href="#SvgjsPath1137" x="150" y="90" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="150" y="150" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1139" x="150" y="210" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1140" x="150" y="270" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="150" y="330" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="150" y="390" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1139" x="150" y="450" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="150" y="510" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1139" x="150" y="570" stroke="rgba(255, 255, 255, 0.4)"></use>

                                <use xlink:href="#SvgjsPath1138" x="210" y="30" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="210" y="90" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1141" x="210" y="150" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1139" x="210" y="210" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1137" x="210" y="270" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1137" x="210" y="330" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1139" x="210" y="390" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1142" x="210" y="450" stroke="rgba(255, 255, 255, 0.4)" stroke-width="3"></use>
                                <use xlink:href="#SvgjsPath1138" x="210" y="510" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="210" y="570" stroke="rgba(255, 255, 255, 0.4)"></use>

                                <use xlink:href="#SvgjsPath1139" x="270" y="30" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="270" y="90" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="270" y="150" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="270" y="210" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1139" x="270" y="270" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1139" x="270" y="330" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1141" x="270" y="390" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="270" y="450" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1139" x="270" y="510" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1139" x="270" y="570" stroke="rgba(255, 255, 255, 0.4)"></use>

                                <use xlink:href="#SvgjsPath1139" x="330" y="30" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="330" y="90" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="330" y="150" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1139" x="330" y="210" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="330" y="270" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1140" x="330" y="330" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="330" y="390" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="330" y="450" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="330" y="510" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="330" y="570" stroke="rgba(255, 255, 255, 0.4)"></use>

                                <use xlink:href="#SvgjsPath1138" x="390" y="30" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="390" y="90" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1139" x="390" y="150" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1137" x="390" y="210" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="390" y="270" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="390" y="330" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1137" x="390" y="390" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1139" x="390" y="450" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1139" x="390" y="510" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1140" x="390" y="570" stroke="rgba(255, 255, 255, 0.4)"></use>

                                <use xlink:href="#SvgjsPath1137" x="450" y="30" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="450" y="90" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1141" x="450" y="150" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="450" y="210" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1140" x="450" y="270" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1141" x="450" y="330" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1141" x="450" y="390" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1137" x="450" y="450" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="450" y="510" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1139" x="450" y="570" stroke="rgba(255, 255, 255, 0.4)"></use>

                                <use xlink:href="#SvgjsPath1138" x="510" y="30" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1139" x="510" y="90" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1139" x="510" y="150" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1139" x="510" y="210" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="510" y="270" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="510" y="330" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="510" y="390" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1137" x="510" y="450" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1141" x="510" y="510" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1140" x="510" y="570" stroke="rgba(255, 255, 255, 0.4)"></use>

                                <use xlink:href="#SvgjsPath1139" x="570" y="30" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="570" y="90" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1139" x="570" y="150" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1139" x="570" y="210" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1139" x="570" y="270" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="570" y="330" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="570" y="390" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1137" x="570" y="450" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1139" x="570" y="510" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1139" x="570" y="570" stroke="rgba(255, 255, 255, 0.4)"></use>

                                <use xlink:href="#SvgjsPath1140" x="630" y="30" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1137" x="630" y="90" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1141" x="630" y="150" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="630" y="210" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1140" x="630" y="270" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1139" x="630" y="330" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="630" y="390" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1139" x="630" y="450" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1139" x="630" y="510" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="630" y="570" stroke="rgba(255, 255, 255, 0.4)"></use>
                                
                                <use xlink:href="#SvgjsPath1139" x="690" y="30" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1139" x="690" y="90" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1139" x="690" y="150" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1141" x="690" y="210" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="690" y="270" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1139" x="690" y="330" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1139" x="690" y="390" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="690" y="450" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1138" x="690" y="510" stroke="rgba(255, 255, 255, 0.4)"></use>
                                <use xlink:href="#SvgjsPath1142" x="690" y="570" stroke="rgba(255, 255, 255, 0.4)" stroke-width="3"></use>
                            </symbol>
                        </svg>
                    </div>
                    <div style="position: relative; padding:24px;background-image: url('build/images/ecommerce/img-2.jpg');background-size: cover;background-position: center; border-radius: 8px;">
                        <div style="position:absolute; top:0; bottom:0; left:0; right:0; background-color: rgba(67, 142, 255, .7); border-radius: 8px;"></div>
                        <div style="position: relative">
                            <div style="text-align: center;">
                                <h5 style="color: #fff !important;font-size: 64px;font-family: 'Inter', sans-serif;font-weight: 600;text-transform: uppercase;margin-bottom: 18px;margin-top: -60px;line-height: 1.2;">Sale</h5>
                                <h5 style="color:#fff !important;font-size: 24px;font-family: 'Inter', sans-serif;font-weight: 600;margin-bottom: 18px;margin: 0px;line-height: 1.2;">Up to</h5>
                                <h5 style="color:#fff !important;font-size: 45px;font-family: 'Inter', sans-serif;font-weight: 600;text-transform: uppercase;margin-bottom: 18px;margin-top: 0px;line-height: 1.2;"><span style="font-size: 120px;">50</span> <span style="width: 20px;display: inline-block;">% Off</span></h5>
                                <p style="color: #fff !important; margin-bottom: 25px;margin-top: 0px;line-height: 1.5;">A flash sale is a discount or promotion offered for a limited period of time.</p>
                            </div>
                            <div>
                                <h5 style="color:#fff !important;font-size: 18px;font-family: 'Inter', sans-serif;font-weight: 600;margin-bottom: 10px;margin-top: 0px;line-height: 1.2;text-align: center;">Additional 50% Off</h5>
                                <p style="color: #fff !important; margin-bottom: 25px;margin-top: 0px;line-height: 1.5;text-align: center;">On Clothes for kids,women & Mens Wear</p>
                                
        
                                <div style="text-align: center;margin-top: 25px;">
                                    <button type="button" style="display: inline-block;padding: 12px 24px;font-size: 14px;font-weight: 400;border-radius: 6px;background-color: #0d355d;color:#fff; border:none ;box-shadow: none;cursor: pointer;text-align: center;box-sizing: border-box;width: 250px;">Shop Now</button>
                                    <p style="color:#fff;margin: 8px 0 0 0;font-size: 13px;">Use code <b>FLASH50</b> at checkout</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

@endsection