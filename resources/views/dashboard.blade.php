<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="rounded-lg bg-white p-4 shadow dark:bg-gray-800 sm:p-6 xl:p-8">
        <div class="mb-4 flex items-center justify-between">
            <div class="shrink-0"><span
                    class="text-2xl font-bold leading-none text-gray-900 dark:text-white sm:text-3xl">$45,385</span>
                <h3 class="text-base font-normal text-gray-600 dark:text-gray-400">Sales this week</h3>
            </div>
            <div class="flex flex-1 items-center justify-end text-base font-bold text-green-600 dark:text-green-400">
                12.5%<svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z"
                        clip-rule="evenodd"></path>
                </svg></div>
        </div>
        <div style="min-height: 435px;">
            <div id="apexchartstr11ml1z" class="apexcharts-canvas apexchartstr11ml1z apexcharts-theme-light"
                style="width: 1169px; height: 420px;"><svg id="SvgjsSvg13095" width="1169" height="420"
                    xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                    xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg apexcharts-zoomable hovering-zoom"
                    xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;">
                    <foreignObject x="0" y="0" width="1169" height="420">
                        <div class="apexcharts-legend apexcharts-align-center apx-legend-position-bottom"
                            xmlns="http://www.w3.org/1999/xhtml"
                            style="inset: auto 0px 1px; position: absolute; max-height: 210px;">
                            <div class="apexcharts-legend-series" rel="1" seriesname="Revenue"
                                data:collapsed="false" style="margin: 2px 10px;"><span class="apexcharts-legend-marker"
                                    rel="1" data:collapsed="false"
                                    style="background: rgb(26, 86, 219); color: rgb(26, 86, 219); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span
                                    class="apexcharts-legend-text" rel="1" i="0" data:default-text="Revenue"
                                    data:collapsed="false"
                                    style="color: rgb(147, 172, 175); font-size: 14px; font-weight: 500; font-family: Inter, sans-serif;">Revenue</span>
                            </div>
                            <div class="apexcharts-legend-series" rel="2" seriesname="Revenuexxpreviousxperiodx"
                                data:collapsed="false" style="margin: 2px 10px;"><span class="apexcharts-legend-marker"
                                    rel="2" data:collapsed="false"
                                    style="background: rgb(253, 186, 140); color: rgb(253, 186, 140); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span
                                    class="apexcharts-legend-text" rel="2" i="1"
                                    data:default-text="Revenue%20(previous%20period)" data:collapsed="false"
                                    style="color: rgb(147, 172, 175); font-size: 14px; font-weight: 500; font-family: Inter, sans-serif;">Revenue
                                    (previous period)</span></div>
                        </div>
                        <style type="text/css">
                            .apexcharts-legend {
                                display: flex;
                                overflow: auto;
                                padding: 0 10px;
                            }

                            .apexcharts-legend.apx-legend-position-bottom,
                            .apexcharts-legend.apx-legend-position-top {
                                flex-wrap: wrap
                            }

                            .apexcharts-legend.apx-legend-position-right,
                            .apexcharts-legend.apx-legend-position-left {
                                flex-direction: column;
                                bottom: 0;
                            }

                            .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-left,
                            .apexcharts-legend.apx-legend-position-top.apexcharts-align-left,
                            .apexcharts-legend.apx-legend-position-right,
                            .apexcharts-legend.apx-legend-position-left {
                                justify-content: flex-start;
                            }

                            .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-center,
                            .apexcharts-legend.apx-legend-position-top.apexcharts-align-center {
                                justify-content: center;
                            }

                            .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-right,
                            .apexcharts-legend.apx-legend-position-top.apexcharts-align-right {
                                justify-content: flex-end;
                            }

                            .apexcharts-legend-series {
                                cursor: pointer;
                                line-height: normal;
                            }

                            .apexcharts-legend.apx-legend-position-bottom .apexcharts-legend-series,
                            .apexcharts-legend.apx-legend-position-top .apexcharts-legend-series {
                                display: flex;
                                align-items: center;
                            }

                            .apexcharts-legend-text {
                                position: relative;
                                font-size: 14px;
                            }

                            .apexcharts-legend-text *,
                            .apexcharts-legend-marker * {
                                pointer-events: none;
                            }

                            .apexcharts-legend-marker {
                                position: relative;
                                display: inline-block;
                                cursor: pointer;
                                margin-right: 3px;
                                border-style: solid;
                            }

                            .apexcharts-legend.apexcharts-align-right .apexcharts-legend-series,
                            .apexcharts-legend.apexcharts-align-left .apexcharts-legend-series {
                                display: inline-block;
                            }

                            .apexcharts-legend-series.apexcharts-no-click {
                                cursor: auto;
                            }

                            .apexcharts-legend .apexcharts-hidden-zero-series,
                            .apexcharts-legend .apexcharts-hidden-null-series {
                                display: none !important;
                            }

                            .apexcharts-inactive-legend {
                                opacity: 0.45;
                            }
                        </style>
                    </foreignObject>
                    <g id="SvgjsG13097" class="apexcharts-inner apexcharts-graphical" transform="translate(94, 30)">
                        <defs id="SvgjsDefs13096">
                            <clipPath id="gridRectMasktr11ml1z">
                                <rect id="SvgjsRect13103" width="1049.4540042877197" height="315.81759814834595" x="-4"
                                    y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none"
                                    stroke-dasharray="0" fill="#fff"></rect>
                            </clipPath>
                            <clipPath id="forecastMasktr11ml1z"></clipPath>
                            <clipPath id="nonForecastMasktr11ml1z"></clipPath>
                            <clipPath id="gridRectMarkerMasktr11ml1z">
                                <rect id="SvgjsRect13104" width="1081.4540042877197" height="351.81759814834595" x="-20"
                                    y="-20" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none"
                                    stroke-dasharray="0" fill="#fff"></rect>
                            </clipPath>
                            <linearGradient id="SvgjsLinearGradient13122" x1="0" y1="0" x2="0"
                                y2="1">
                                <stop id="SvgjsStop13123" stop-opacity="0" stop-color="rgba(26,86,219,0)"
                                    offset="0"></stop>
                                <stop id="SvgjsStop13124" stop-opacity="0.15" stop-color="rgba(141,171,237,0.15)"
                                    offset="1"></stop>
                                <stop id="SvgjsStop13125" stop-opacity="0.15" stop-color="rgba(141,171,237,0.15)"
                                    offset="1"></stop>
                            </linearGradient>
                            <linearGradient id="SvgjsLinearGradient13144" x1="0" y1="0"
                                x2="0" y2="1">
                                <stop id="SvgjsStop13145" stop-opacity="0" stop-color="rgba(253,186,140,0)"
                                    offset="0"></stop>
                                <stop id="SvgjsStop13146" stop-opacity="0.15" stop-color="rgba(254,221,198,0.15)"
                                    offset="1"></stop>
                                <stop id="SvgjsStop13147" stop-opacity="0.15" stop-color="rgba(254,221,198,0.15)"
                                    offset="1"></stop>
                            </linearGradient>
                        </defs>
                        <line id="SvgjsLine13102" x1="693.8026695251465" y1="0" x2="693.8026695251465"
                            y2="311.81759814834595" stroke="#374151" stroke-dasharray="10" stroke-linecap="butt"
                            class="apexcharts-xcrosshairs" x="693.8026695251465" y="0" width="1"
                            height="311.81759814834595" fill="#b1b9c4" filter="none" fill-opacity="0.9"
                            stroke-width="1"></line>
                        <g id="SvgjsG13161" class="apexcharts-xaxis" transform="translate(0, 0)">
                            <g id="SvgjsG13162" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"><text
                                    id="SvgjsText13164" font-family="Inter, sans-serif" x="0" y="340.81759814834595"
                                    text-anchor="middle" dominant-baseline="auto" font-size="14px" font-weight="500"
                                    fill="#93acaf" class="apexcharts-text apexcharts-xaxis-label "
                                    style="font-family: Inter, sans-serif;">
                                    <tspan id="SvgjsTspan13165">01 Feb</tspan>
                                    <title>01 Feb</title>
                                </text><text id="SvgjsText13167" font-family="Inter, sans-serif"
                                    x="173.57566738128662" y="340.81759814834595" text-anchor="middle"
                                    dominant-baseline="auto" font-size="14px" font-weight="500" fill="#93acaf"
                                    class="apexcharts-text apexcharts-xaxis-label "
                                    style="font-family: Inter, sans-serif;">
                                    <tspan id="SvgjsTspan13168">02 Feb</tspan>
                                    <title>02 Feb</title>
                                </text><text id="SvgjsText13170" font-family="Inter, sans-serif"
                                    x="347.15133476257324" y="340.81759814834595" text-anchor="middle"
                                    dominant-baseline="auto" font-size="14px" font-weight="500" fill="#93acaf"
                                    class="apexcharts-text apexcharts-xaxis-label "
                                    style="font-family: Inter, sans-serif;">
                                    <tspan id="SvgjsTspan13171">03 Feb</tspan>
                                    <title>03 Feb</title>
                                </text><text id="SvgjsText13173" font-family="Inter, sans-serif" x="520.7270021438599"
                                    y="340.81759814834595" text-anchor="middle" dominant-baseline="auto"
                                    font-size="14px" font-weight="500" fill="#93acaf"
                                    class="apexcharts-text apexcharts-xaxis-label "
                                    style="font-family: Inter, sans-serif;">
                                    <tspan id="SvgjsTspan13174">04 Feb</tspan>
                                    <title>04 Feb</title>
                                </text><text id="SvgjsText13176" font-family="Inter, sans-serif" x="694.3026695251465"
                                    y="340.81759814834595" text-anchor="middle" dominant-baseline="auto"
                                    font-size="14px" font-weight="500" fill="#93acaf"
                                    class="apexcharts-text apexcharts-xaxis-label "
                                    style="font-family: Inter, sans-serif;">
                                    <tspan id="SvgjsTspan13177">05 Feb</tspan>
                                    <title>05 Feb</title>
                                </text><text id="SvgjsText13179" font-family="Inter, sans-serif" x="867.8783369064331"
                                    y="340.81759814834595" text-anchor="middle" dominant-baseline="auto"
                                    font-size="14px" font-weight="500" fill="#93acaf"
                                    class="apexcharts-text apexcharts-xaxis-label "
                                    style="font-family: Inter, sans-serif;">
                                    <tspan id="SvgjsTspan13180">06 Feb</tspan>
                                    <title>06 Feb</title>
                                </text><text id="SvgjsText13182" font-family="Inter, sans-serif"
                                    x="1041.4540042877197" y="340.81759814834595" text-anchor="middle"
                                    dominant-baseline="auto" font-size="14px" font-weight="500" fill="#93acaf"
                                    class="apexcharts-text apexcharts-xaxis-label "
                                    style="font-family: Inter, sans-serif;">
                                    <tspan id="SvgjsTspan13183">07 Feb</tspan>
                                    <title>07 Feb</title>
                                </text></g>
                        </g>
                        <g id="SvgjsG13150" class="apexcharts-grid">
                            <g id="SvgjsG13151" class="apexcharts-gridlines-horizontal">
                                <line id="SvgjsLine13155" x1="0" y1="77.95439953708649"
                                    x2="1041.4540042877197" y2="77.95439953708649" stroke="#374151"
                                    stroke-dasharray="1" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                <line id="SvgjsLine13156" x1="0" y1="155.90879907417298"
                                    x2="1041.4540042877197" y2="155.90879907417298" stroke="#374151"
                                    stroke-dasharray="1" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                <line id="SvgjsLine13157" x1="0" y1="233.86319861125946"
                                    x2="1041.4540042877197" y2="233.86319861125946" stroke="#374151"
                                    stroke-dasharray="1" stroke-linecap="butt" class="apexcharts-gridline"></line>
                            </g>
                            <g id="SvgjsG13152" class="apexcharts-gridlines-vertical"></g>
                            <line id="SvgjsLine13160" x1="0" y1="311.81759814834595" x2="1041.4540042877197"
                                y2="311.81759814834595" stroke="transparent" stroke-dasharray="0"
                                stroke-linecap="butt"></line>
                            <line id="SvgjsLine13159" x1="0" y1="1" x2="0"
                                y2="311.81759814834595" stroke="transparent" stroke-dasharray="0"
                                stroke-linecap="butt"></line>
                        </g>
                        <g id="SvgjsG13105" class="apexcharts-area-series apexcharts-plot-series">
                            <g id="SvgjsG13106" class="apexcharts-series" seriesName="Revenue"
                                data:longestSeries="true" rel="1" data:realIndex="0">
                                <path id="SvgjsPath13126"
                                    d="M0 311.81759814834595L0 173.05876697233225C60.751483583450316 173.05876697233225 112.8241837978363 226.84730265292183 173.57566738128662 226.84730265292183C234.32715096473694 226.84730265292183 286.39985117912295 251.01316650941862 347.15133476257324 251.01316650941862C407.90281834602354 251.01316650941862 459.97551856040957 106.79752736580849 520.7270021438599 106.79752736580849C581.4784857273102 106.79752736580849 633.5511859416962 173.05876697233225 694.3026695251465 173.05876697233225C755.0541531085968 173.05876697233225 807.1268533229828 212.0359667408752 867.8783369064331 212.0359667408752C928.6298204898834 212.0359667408752 980.7025207042694 289.99036627796204 1041.4540042877197 289.99036627796204C1041.4540042877197 289.99036627796204 1041.4540042877197 289.99036627796204 1041.4540042877197 311.81759814834595M1041.4540042877197 289.99036627796204L1041.4540042877197 289.99036627796204 "
                                    fill="url(#SvgjsLinearGradient13122)" fill-opacity="1" stroke-opacity="1"
                                    stroke-linecap="butt" stroke-width="0" stroke-dasharray="0"
                                    class="apexcharts-area" index="0" clip-path="url(#gridRectMasktr11ml1z)"
                                    pathTo="M 0 311.81759814834595 L 0 173.05876697233225C 60.751483583450316 173.05876697233225 112.8241837978363 226.84730265292183 173.57566738128662 226.84730265292183C 234.32715096473694 226.84730265292183 286.39985117912295 251.01316650941862 347.15133476257324 251.01316650941862C 407.90281834602354 251.01316650941862 459.97551856040957 106.79752736580849 520.7270021438599 106.79752736580849C 581.4784857273102 106.79752736580849 633.5511859416962 173.05876697233225 694.3026695251465 173.05876697233225C 755.0541531085968 173.05876697233225 807.1268533229828 212.0359667408752 867.8783369064331 212.0359667408752C 928.6298204898834 212.0359667408752 980.7025207042694 289.99036627796204 1041.4540042877197 289.99036627796204C 1041.4540042877197 289.99036627796204 1041.4540042877197 289.99036627796204 1041.4540042877197 311.81759814834595M 1041.4540042877197 289.99036627796204z"
                                    pathFrom="M 0 311.81759814834595 L 0 173.05876697233225C 60.751483583450316 173.05876697233225 112.8241837978363 226.84730265292183 173.57566738128662 226.84730265292183C 234.32715096473694 226.84730265292183 286.39985117912295 251.01316650941862 347.15133476257324 251.01316650941862C 407.90281834602354 251.01316650941862 459.97551856040957 106.79752736580849 520.7270021438599 106.79752736580849C 581.4784857273102 106.79752736580849 633.5511859416962 173.05876697233225 694.3026695251465 173.05876697233225C 755.0541531085968 173.05876697233225 807.1268533229828 212.0359667408752 867.8783369064331 212.0359667408752C 928.6298204898834 212.0359667408752 980.7025207042694 289.99036627796204 1041.4540042877197 289.99036627796204C 1041.4540042877197 289.99036627796204 1041.4540042877197 289.99036627796204 1041.4540042877197 311.81759814834595M 1041.4540042877197 289.99036627796204z">
                                </path>
                                <path id="SvgjsPath13127"
                                    d="M0 173.05876697233225C60.751483583450316 173.05876697233225 112.8241837978363 226.84730265292183 173.57566738128662 226.84730265292183C234.32715096473694 226.84730265292183 286.39985117912295 251.01316650941862 347.15133476257324 251.01316650941862C407.90281834602354 251.01316650941862 459.97551856040957 106.79752736580849 520.7270021438599 106.79752736580849C581.4784857273102 106.79752736580849 633.5511859416962 173.05876697233225 694.3026695251465 173.05876697233225C755.0541531085968 173.05876697233225 807.1268533229828 212.0359667408752 867.8783369064331 212.0359667408752C928.6298204898834 212.0359667408752 980.7025207042694 289.99036627796204 1041.4540042877197 289.99036627796204 "
                                    fill="none" fill-opacity="1" stroke="#1a56db" stroke-opacity="1"
                                    stroke-linecap="butt" stroke-width="4" stroke-dasharray="0"
                                    class="apexcharts-area" index="0" clip-path="url(#gridRectMasktr11ml1z)"
                                    pathTo="M 0 173.05876697233225C 60.751483583450316 173.05876697233225 112.8241837978363 226.84730265292183 173.57566738128662 226.84730265292183C 234.32715096473694 226.84730265292183 286.39985117912295 251.01316650941862 347.15133476257324 251.01316650941862C 407.90281834602354 251.01316650941862 459.97551856040957 106.79752736580849 520.7270021438599 106.79752736580849C 581.4784857273102 106.79752736580849 633.5511859416962 173.05876697233225 694.3026695251465 173.05876697233225C 755.0541531085968 173.05876697233225 807.1268533229828 212.0359667408752 867.8783369064331 212.0359667408752C 928.6298204898834 212.0359667408752 980.7025207042694 289.99036627796204 1041.4540042877197 289.99036627796204"
                                    pathFrom="M 0 173.05876697233225C 60.751483583450316 173.05876697233225 112.8241837978363 226.84730265292183 173.57566738128662 226.84730265292183C 234.32715096473694 226.84730265292183 286.39985117912295 251.01316650941862 347.15133476257324 251.01316650941862C 407.90281834602354 251.01316650941862 459.97551856040957 106.79752736580849 520.7270021438599 106.79752736580849C 581.4784857273102 106.79752736580849 633.5511859416962 173.05876697233225 694.3026695251465 173.05876697233225C 755.0541531085968 173.05876697233225 807.1268533229828 212.0359667408752 867.8783369064331 212.0359667408752C 928.6298204898834 212.0359667408752 980.7025207042694 289.99036627796204 1041.4540042877197 289.99036627796204"
                                    fill-rule="evenodd"></path>
                                <g id="SvgjsG13107" class="apexcharts-series-markers-wrap" data:realIndex="0">
                                    <g id="SvgjsG13109" class="apexcharts-series-markers"
                                        clip-path="url(#gridRectMarkerMasktr11ml1z)">
                                        <circle id="SvgjsCircle13110" r="5" cx="0" cy="173.05876697233225"
                                            class="apexcharts-marker no-pointer-events we8rffggs" stroke="#ffffff"
                                            fill="#1a56db" fill-opacity="1" stroke-width="2" stroke-opacity="0.9"
                                            rel="0" j="0" index="0" default-marker-size="5"></circle>
                                        <circle id="SvgjsCircle13111" r="5" cx="173.57566738128662"
                                            cy="226.84730265292183"
                                            class="apexcharts-marker no-pointer-events whdo4hlrw" stroke="#ffffff"
                                            fill="#1a56db" fill-opacity="1" stroke-width="2" stroke-opacity="0.9"
                                            rel="1" j="1" index="0" default-marker-size="5"></circle>
                                    </g>
                                    <g id="SvgjsG13112" class="apexcharts-series-markers"
                                        clip-path="url(#gridRectMarkerMasktr11ml1z)">
                                        <circle id="SvgjsCircle13113" r="5" cx="347.15133476257324"
                                            cy="251.01316650941862"
                                            class="apexcharts-marker no-pointer-events wm0dte137" stroke="#ffffff"
                                            fill="#1a56db" fill-opacity="1" stroke-width="2" stroke-opacity="0.9"
                                            rel="2" j="2" index="0" default-marker-size="5"></circle>
                                    </g>
                                    <g id="SvgjsG13114" class="apexcharts-series-markers"
                                        clip-path="url(#gridRectMarkerMasktr11ml1z)">
                                        <circle id="SvgjsCircle13115" r="5" cx="520.7270021438599"
                                            cy="106.79752736580849"
                                            class="apexcharts-marker no-pointer-events wte6gdztx" stroke="#ffffff"
                                            fill="#1a56db" fill-opacity="1" stroke-width="2" stroke-opacity="0.9"
                                            rel="3" j="3" index="0" default-marker-size="5"></circle>
                                    </g>
                                    <g id="SvgjsG13116" class="apexcharts-series-markers"
                                        clip-path="url(#gridRectMarkerMasktr11ml1z)">
                                        <circle id="SvgjsCircle13117" r="5" cx="694.3026695251465"
                                            cy="173.05876697233225"
                                            class="apexcharts-marker no-pointer-events wtoblcihk" stroke="#ffffff"
                                            fill="#1a56db" fill-opacity="1" stroke-width="2" stroke-opacity="0.9"
                                            rel="4" j="4" index="0" default-marker-size="5"></circle>
                                    </g>
                                    <g id="SvgjsG13118" class="apexcharts-series-markers"
                                        clip-path="url(#gridRectMarkerMasktr11ml1z)">
                                        <circle id="SvgjsCircle13119" r="5" cx="867.8783369064331"
                                            cy="212.0359667408752"
                                            class="apexcharts-marker no-pointer-events w8uj8ows8" stroke="#ffffff"
                                            fill="#1a56db" fill-opacity="1" stroke-width="2" stroke-opacity="0.9"
                                            rel="5" j="5" index="0" default-marker-size="5"></circle>
                                    </g>
                                    <g id="SvgjsG13120" class="apexcharts-series-markers"
                                        clip-path="url(#gridRectMarkerMasktr11ml1z)">
                                        <circle id="SvgjsCircle13121" r="5" cx="1041.4540042877197"
                                            cy="289.99036627796204"
                                            class="apexcharts-marker no-pointer-events w6rotr207l" stroke="#ffffff"
                                            fill="#1a56db" fill-opacity="1" stroke-width="2" stroke-opacity="0.9"
                                            rel="6" j="6" index="0" default-marker-size="5"></circle>
                                    </g>
                                </g>
                            </g>
                            <g id="SvgjsG13128" class="apexcharts-series" seriesName="Revenuexxpreviousxperiodx"
                                data:longestSeries="true" rel="2" data:realIndex="1">
                                <path id="SvgjsPath13148"
                                    d="M0 311.81759814834595L0 95.10436743524588C60.751483583450316 95.10436743524588 112.8241837978363 29.232899826407447 173.57566738128662 29.232899826407447C234.32715096473694 29.232899826407447 286.39985117912295 146.55427112972257 347.15133476257324 146.55427112972257C407.90281834602354 146.55427112972257 459.97551856040957 173.05876697233225 520.7270021438599 173.05876697233225C581.4784857273102 173.05876697233225 633.5511859416962 83.4112075046828 694.3026695251465 83.4112075046828C755.0541531085968 83.4112075046828 807.1268533229828 17.149967898159048 867.8783369064331 17.149967898159048C928.6298204898834 17.149967898159048 980.7025207042694 71.71804757411974 1041.4540042877197 71.71804757411974C1041.4540042877197 71.71804757411974 1041.4540042877197 71.71804757411974 1041.4540042877197 311.81759814834595M1041.4540042877197 71.71804757411974L1041.4540042877197 71.71804757411974 "
                                    fill="url(#SvgjsLinearGradient13144)" fill-opacity="1" stroke-opacity="1"
                                    stroke-linecap="butt" stroke-width="0" stroke-dasharray="0"
                                    class="apexcharts-area" index="1" clip-path="url(#gridRectMasktr11ml1z)"
                                    pathTo="M 0 311.81759814834595 L 0 95.10436743524588C 60.751483583450316 95.10436743524588 112.8241837978363 29.232899826407447 173.57566738128662 29.232899826407447C 234.32715096473694 29.232899826407447 286.39985117912295 146.55427112972257 347.15133476257324 146.55427112972257C 407.90281834602354 146.55427112972257 459.97551856040957 173.05876697233225 520.7270021438599 173.05876697233225C 581.4784857273102 173.05876697233225 633.5511859416962 83.4112075046828 694.3026695251465 83.4112075046828C 755.0541531085968 83.4112075046828 807.1268533229828 17.149967898159048 867.8783369064331 17.149967898159048C 928.6298204898834 17.149967898159048 980.7025207042694 71.71804757411974 1041.4540042877197 71.71804757411974C 1041.4540042877197 71.71804757411974 1041.4540042877197 71.71804757411974 1041.4540042877197 311.81759814834595M 1041.4540042877197 71.71804757411974z"
                                    pathFrom="M 0 311.81759814834595 L 0 95.10436743524588C 60.751483583450316 95.10436743524588 112.8241837978363 29.232899826407447 173.57566738128662 29.232899826407447C 234.32715096473694 29.232899826407447 286.39985117912295 146.55427112972257 347.15133476257324 146.55427112972257C 407.90281834602354 146.55427112972257 459.97551856040957 173.05876697233225 520.7270021438599 173.05876697233225C 581.4784857273102 173.05876697233225 633.5511859416962 83.4112075046828 694.3026695251465 83.4112075046828C 755.0541531085968 83.4112075046828 807.1268533229828 17.149967898159048 867.8783369064331 17.149967898159048C 928.6298204898834 17.149967898159048 980.7025207042694 71.71804757411974 1041.4540042877197 71.71804757411974C 1041.4540042877197 71.71804757411974 1041.4540042877197 71.71804757411974 1041.4540042877197 311.81759814834595M 1041.4540042877197 71.71804757411974z">
                                </path>
                                <path id="SvgjsPath13149"
                                    d="M0 95.10436743524588C60.751483583450316 95.10436743524588 112.8241837978363 29.232899826407447 173.57566738128662 29.232899826407447C234.32715096473694 29.232899826407447 286.39985117912295 146.55427112972257 347.15133476257324 146.55427112972257C407.90281834602354 146.55427112972257 459.97551856040957 173.05876697233225 520.7270021438599 173.05876697233225C581.4784857273102 173.05876697233225 633.5511859416962 83.4112075046828 694.3026695251465 83.4112075046828C755.0541531085968 83.4112075046828 807.1268533229828 17.149967898159048 867.8783369064331 17.149967898159048C928.6298204898834 17.149967898159048 980.7025207042694 71.71804757411974 1041.4540042877197 71.71804757411974 "
                                    fill="none" fill-opacity="1" stroke="#fdba8c" stroke-opacity="1"
                                    stroke-linecap="butt" stroke-width="4" stroke-dasharray="0"
                                    class="apexcharts-area" index="1" clip-path="url(#gridRectMasktr11ml1z)"
                                    pathTo="M 0 95.10436743524588C 60.751483583450316 95.10436743524588 112.8241837978363 29.232899826407447 173.57566738128662 29.232899826407447C 234.32715096473694 29.232899826407447 286.39985117912295 146.55427112972257 347.15133476257324 146.55427112972257C 407.90281834602354 146.55427112972257 459.97551856040957 173.05876697233225 520.7270021438599 173.05876697233225C 581.4784857273102 173.05876697233225 633.5511859416962 83.4112075046828 694.3026695251465 83.4112075046828C 755.0541531085968 83.4112075046828 807.1268533229828 17.149967898159048 867.8783369064331 17.149967898159048C 928.6298204898834 17.149967898159048 980.7025207042694 71.71804757411974 1041.4540042877197 71.71804757411974"
                                    pathFrom="M 0 95.10436743524588C 60.751483583450316 95.10436743524588 112.8241837978363 29.232899826407447 173.57566738128662 29.232899826407447C 234.32715096473694 29.232899826407447 286.39985117912295 146.55427112972257 347.15133476257324 146.55427112972257C 407.90281834602354 146.55427112972257 459.97551856040957 173.05876697233225 520.7270021438599 173.05876697233225C 581.4784857273102 173.05876697233225 633.5511859416962 83.4112075046828 694.3026695251465 83.4112075046828C 755.0541531085968 83.4112075046828 807.1268533229828 17.149967898159048 867.8783369064331 17.149967898159048C 928.6298204898834 17.149967898159048 980.7025207042694 71.71804757411974 1041.4540042877197 71.71804757411974"
                                    fill-rule="evenodd"></path>
                                <g id="SvgjsG13129" class="apexcharts-series-markers-wrap" data:realIndex="1">
                                    <g id="SvgjsG13131" class="apexcharts-series-markers"
                                        clip-path="url(#gridRectMarkerMasktr11ml1z)">
                                        <circle id="SvgjsCircle13132" r="5" cx="0" cy="95.10436743524588"
                                            class="apexcharts-marker no-pointer-events wemi6vmqw" stroke="#ffffff"
                                            fill="#fdba8c" fill-opacity="1" stroke-width="2" stroke-opacity="0.9"
                                            rel="0" j="0" index="1" default-marker-size="5"></circle>
                                        <circle id="SvgjsCircle13133" r="5" cx="173.57566738128662"
                                            cy="29.232899826407447"
                                            class="apexcharts-marker no-pointer-events wzp557tpx" stroke="#ffffff"
                                            fill="#fdba8c" fill-opacity="1" stroke-width="2" stroke-opacity="0.9"
                                            rel="1" j="1" index="1" default-marker-size="5"></circle>
                                    </g>
                                    <g id="SvgjsG13134" class="apexcharts-series-markers"
                                        clip-path="url(#gridRectMarkerMasktr11ml1z)">
                                        <circle id="SvgjsCircle13135" r="5" cx="347.15133476257324"
                                            cy="146.55427112972257"
                                            class="apexcharts-marker no-pointer-events wq8cfyc8o" stroke="#ffffff"
                                            fill="#fdba8c" fill-opacity="1" stroke-width="2" stroke-opacity="0.9"
                                            rel="2" j="2" index="1" default-marker-size="5"></circle>
                                    </g>
                                    <g id="SvgjsG13136" class="apexcharts-series-markers"
                                        clip-path="url(#gridRectMarkerMasktr11ml1z)">
                                        <circle id="SvgjsCircle13137" r="5" cx="520.7270021438599"
                                            cy="173.05876697233225"
                                            class="apexcharts-marker no-pointer-events wxenyr4d2" stroke="#ffffff"
                                            fill="#fdba8c" fill-opacity="1" stroke-width="2" stroke-opacity="0.9"
                                            rel="3" j="3" index="1" default-marker-size="5"></circle>
                                    </g>
                                    <g id="SvgjsG13138" class="apexcharts-series-markers"
                                        clip-path="url(#gridRectMarkerMasktr11ml1z)">
                                        <circle id="SvgjsCircle13139" r="5" cx="694.3026695251465"
                                            cy="83.4112075046828"
                                            class="apexcharts-marker no-pointer-events wa82y72e7" stroke="#ffffff"
                                            fill="#fdba8c" fill-opacity="1" stroke-width="2" stroke-opacity="0.9"
                                            rel="4" j="4" index="1" default-marker-size="5"></circle>
                                    </g>
                                    <g id="SvgjsG13140" class="apexcharts-series-markers"
                                        clip-path="url(#gridRectMarkerMasktr11ml1z)">
                                        <circle id="SvgjsCircle13141" r="5" cx="867.8783369064331"
                                            cy="17.149967898159048"
                                            class="apexcharts-marker no-pointer-events wn70cmjlwl" stroke="#ffffff"
                                            fill="#fdba8c" fill-opacity="1" stroke-width="2" stroke-opacity="0.9"
                                            rel="5" j="5" index="1" default-marker-size="5"></circle>
                                    </g>
                                    <g id="SvgjsG13142" class="apexcharts-series-markers"
                                        clip-path="url(#gridRectMarkerMasktr11ml1z)">
                                        <circle id="SvgjsCircle13143" r="5" cx="1041.4540042877197"
                                            cy="71.71804757411974"
                                            class="apexcharts-marker no-pointer-events w64cj7qdi" stroke="#ffffff"
                                            fill="#fdba8c" fill-opacity="1" stroke-width="2" stroke-opacity="0.9"
                                            rel="6" j="6" index="1" default-marker-size="5"></circle>
                                    </g>
                                </g>
                            </g>
                            <g id="SvgjsG13108" class="apexcharts-datalabels" data:realIndex="0"></g>
                            <g id="SvgjsG13130" class="apexcharts-datalabels" data:realIndex="1"></g>
                        </g>
                        <g id="SvgjsG13153" class="apexcharts-grid-borders">
                            <line id="SvgjsLine13154" x1="0" y1="0" x2="1041.4540042877197"
                                y2="0" stroke="#374151" stroke-dasharray="1" stroke-linecap="butt"
                                class="apexcharts-gridline"></line>
                            <line id="SvgjsLine13158" x1="0" y1="311.81759814834595" x2="1041.4540042877197"
                                y2="311.81759814834595" stroke="#374151" stroke-dasharray="1" stroke-linecap="butt"
                                class="apexcharts-gridline"></line>
                            <line id="SvgjsLine13184" x1="0" y1="312.81759814834595" x2="1041.4540042877197"
                                y2="312.81759814834595" stroke="#374151" stroke-dasharray="0" stroke-width="1"
                                stroke-linecap="butt"></line>
                        </g>
                        <line id="SvgjsLine13202" x1="0" y1="0" x2="1041.4540042877197"
                            y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1"
                            stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                        <line id="SvgjsLine13203" x1="0" y1="0" x2="1041.4540042877197"
                            y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt"
                            class="apexcharts-ycrosshairs-hidden"></line>
                        <g id="SvgjsG13204" class="apexcharts-yaxis-annotations"></g>
                        <g id="SvgjsG13205" class="apexcharts-xaxis-annotations"></g>
                        <g id="SvgjsG13206" class="apexcharts-point-annotations"></g>
                        <rect id="SvgjsRect13207" width="0" height="0" x="0" y="0" rx="0"
                            ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"
                            fill="#fefefe" class="apexcharts-zoom-rect"></rect>
                        <rect id="SvgjsRect13208" width="0" height="0" x="0" y="0" rx="0"
                            ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"
                            fill="#fefefe" class="apexcharts-selection-rect"></rect>
                    </g>
                    <rect id="SvgjsRect13101" width="0" height="0" x="0" y="0" rx="0"
                        ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"
                        fill="#fefefe"></rect>
                    <g id="SvgjsG13185" class="apexcharts-yaxis" rel="0" transform="translate(41, 0)">
                        <g id="SvgjsG13186" class="apexcharts-yaxis-texts-g"><text id="SvgjsText13188"
                                font-family="Inter, sans-serif" x="20" y="31.4" text-anchor="end"
                                dominant-baseline="auto" font-size="14px" font-weight="500" fill="#93acaf"
                                class="apexcharts-text apexcharts-yaxis-label "
                                style="font-family: Inter, sans-serif;">
                                <tspan id="SvgjsTspan13189">$6800</tspan>
                                <title>$6800</title>
                            </text><text id="SvgjsText13191" font-family="Inter, sans-serif" x="20"
                                y="109.3543995370865" text-anchor="end" dominant-baseline="auto" font-size="14px"
                                font-weight="500" fill="#93acaf" class="apexcharts-text apexcharts-yaxis-label "
                                style="font-family: Inter, sans-serif;">
                                <tspan id="SvgjsTspan13192">$6600</tspan>
                                <title>$6600</title>
                            </text><text id="SvgjsText13194" font-family="Inter, sans-serif" x="20"
                                y="187.30879907417298" text-anchor="end" dominant-baseline="auto" font-size="14px"
                                font-weight="500" fill="#93acaf" class="apexcharts-text apexcharts-yaxis-label "
                                style="font-family: Inter, sans-serif;">
                                <tspan id="SvgjsTspan13195">$6400</tspan>
                                <title>$6400</title>
                            </text><text id="SvgjsText13197" font-family="Inter, sans-serif" x="20"
                                y="265.26319861125944" text-anchor="end" dominant-baseline="auto" font-size="14px"
                                font-weight="500" fill="#93acaf" class="apexcharts-text apexcharts-yaxis-label "
                                style="font-family: Inter, sans-serif;">
                                <tspan id="SvgjsTspan13198">$6200</tspan>
                                <title>$6200</title>
                            </text><text id="SvgjsText13200" font-family="Inter, sans-serif" x="20"
                                y="343.2175981483459" text-anchor="end" dominant-baseline="auto" font-size="14px"
                                font-weight="500" fill="#93acaf" class="apexcharts-text apexcharts-yaxis-label "
                                style="font-family: Inter, sans-serif;">
                                <tspan id="SvgjsTspan13201">$6000</tspan>
                                <title>$6000</title>
                            </text></g>
                    </g>
                    <g id="SvgjsG13098" class="apexcharts-annotations"></g>
                </svg>
                <div class="apexcharts-tooltip apexcharts-theme-light" style="left: 509.203px; top: 87.4112px;">
                    <div class="apexcharts-tooltip-title" style="font-family: Inter, sans-serif; font-size: 14px;">05
                        Feb</div>
                    <div class="apexcharts-tooltip-series-group apexcharts-active" style="order: 1; display: flex;">
                        <span class="apexcharts-tooltip-marker" style="background-color: rgb(26, 86, 219);"></span>
                        <div class="apexcharts-tooltip-text" style="font-family: Inter, sans-serif; font-size: 14px;">
                            <div class="apexcharts-tooltip-y-group"><span
                                    class="apexcharts-tooltip-text-y-label">Revenue: </span><span
                                    class="apexcharts-tooltip-text-y-value">$6356</span></div>
                            <div class="apexcharts-tooltip-goals-group"><span
                                    class="apexcharts-tooltip-text-goals-label"></span><span
                                    class="apexcharts-tooltip-text-goals-value"></span></div>
                            <div class="apexcharts-tooltip-z-group"><span
                                    class="apexcharts-tooltip-text-z-label"></span><span
                                    class="apexcharts-tooltip-text-z-value"></span></div>
                        </div>
                    </div>
                    <div class="apexcharts-tooltip-series-group apexcharts-active" style="order: 2; display: flex;">
                        <span class="apexcharts-tooltip-marker" style="background-color: rgb(253, 186, 140);"></span>
                        <div class="apexcharts-tooltip-text" style="font-family: Inter, sans-serif; font-size: 14px;">
                            <div class="apexcharts-tooltip-y-group"><span
                                    class="apexcharts-tooltip-text-y-label">Revenue (previous period): </span><span
                                    class="apexcharts-tooltip-text-y-value">$6586</span></div>
                            <div class="apexcharts-tooltip-goals-group"><span
                                    class="apexcharts-tooltip-text-goals-label"></span><span
                                    class="apexcharts-tooltip-text-goals-value"></span></div>
                            <div class="apexcharts-tooltip-z-group"><span
                                    class="apexcharts-tooltip-text-z-label"></span><span
                                    class="apexcharts-tooltip-text-z-value"></span></div>
                        </div>
                    </div>
                </div>
                <div class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-light"
                    style="left: 754.878px; top: 343.818px;">
                    <div class="apexcharts-xaxistooltip-text"
                        style="font-family: Inter, sans-serif; font-size: 12px; min-width: 35.775px;">05 Feb</div>
                </div>
                <div
                    class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                    <div class="apexcharts-yaxistooltip-text"></div>
                </div>
            </div>
        </div>
        <div class="mt-5 flex items-center justify-between border-t border-gray-200 pt-3 dark:border-gray-700 sm:pt-6">
            <span class="text-sm text-gray-600">
                <div class="w-fit dark:text-white" data-testid="flowbite-tooltip-target"><button
                        class="flex items-center">Last 7 days<svg stroke="currentColor" fill="none"
                            stroke-width="0" viewBox="0 0 24 24" class="ml-2 h-4 w-4" height="1em" width="1em"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg></button></div>
                <div data-testid="flowbite-tooltip" tabindex="-1"
                    class="z-10 w-fit rounded-xl divide-y divide-gray-100 shadow transition-opacity duration-100 invisible opacity-0 border border-gray-200 bg-white text-gray-900 dark:border-none dark:bg-gray-700 dark:text-white"
                    id=":r14:" role="tooltip" style="position: absolute; top: 647.8px; left: 48px;">
                    <div class="rounded-xl text-sm text-gray-700 dark:text-gray-200">
                        <ul class="">
                            <li
                                class="flex items-center justify-start py-2 px-4 text-sm text-gray-700 cursor-pointer hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white">
                                <strong>Sep 16, 2021 - Sep 22, 2021</strong></li>
                            <div class="my-1 h-px bg-gray-100 dark:bg-gray-600"></div>
                            <li
                                class="flex items-center justify-start py-2 px-4 text-sm text-gray-700 cursor-pointer hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white">
                                Yesterday</li>
                            <li
                                class="flex items-center justify-start py-2 px-4 text-sm text-gray-700 cursor-pointer hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white">
                                Today</li>
                            <li
                                class="flex items-center justify-start py-2 px-4 text-sm text-gray-700 cursor-pointer hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white">
                                Last 7 days</li>
                            <li
                                class="flex items-center justify-start py-2 px-4 text-sm text-gray-700 cursor-pointer hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white">
                                Last 30 days</li>
                            <li
                                class="flex items-center justify-start py-2 px-4 text-sm text-gray-700 cursor-pointer hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white">
                                Last 90 days</li>
                            <div class="my-1 h-px bg-gray-100 dark:bg-gray-600"></div>
                            <li
                                class="flex items-center justify-start py-2 px-4 text-sm text-gray-700 cursor-pointer hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white">
                                Custom...</li>
                        </ul>
                    </div>
                </div>
            </span>
            <div class="shrink-0"><a href="#"
                    class="inline-flex items-center rounded-lg p-2 text-xs font-medium uppercase text-primary-700 hover:bg-gray-100 dark:text-primary-500 dark:hover:bg-gray-700 sm:text-sm">Sales
                    Report<svg class="ml-1 h-4 w-4 sm:h-5 sm:w-5" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                        </path>
                    </svg></a></div>
        </div>
    </div>

</x-app-layout>
