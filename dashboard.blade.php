<!DOCTYPE html>
<html>
  <head>
    <title>{{$title}}</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <meta name="description" content="{{ $description }}" />
    
    @empty($logo)
    <link rel="icon" href="/theme/{{$theme}}/favicon.svg" />
    @endempty
    <link rel="icon" href="{{ $logo }}" />
  
    <link rel="stylesheet" href="/theme/{{$theme}}/static/phosphor-icons/duotone/style.css" />
    <link rel="stylesheet" href="/theme/{{$theme}}/static/phosphor-icons/regular/style.css" />
    
  @if (file_exists(public_path("/theme/{$theme}/static/custom.css")))
    <link rel="stylesheet" href="/theme/{{$theme}}/static/custom.css?v=20231016235715" />
  @endif
  
    <style>
      html,
      body {
        height: 100%;
        margin: 0;
      }
      a {
        color: inherit;
        text-decoration: none;
      }
      .is-darkmode {
        background-color: #272827;
      }
      .is-darkmode .loading-user:before {
        display: none;
      }
      .hourglassx {
        width: 120px;
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
      }
      .hourglass {
        stroke-dasharray: 210;
        -webkit-animation: snake 3s linear infinite both;
        animation: snake 3s linear infinite both;
      }
      .loading-user {
        width: 40%;
        text-align: center;
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        font-size: 24px;
        color: #999;
        overflow: hidden;
      }

      .loading-user:before {
        content: '';
        position: absolute;
        left: -100px;
        top: -80px;
        width: 16px;
        height: 400px;
        background-color: rgba(255, 255, 255, 0.8);
        transform: rotate(45deg);
        animation: flash 1.5s linear 0.1s infinite;
      }
      @-webkit-keyframes snake {
        0% {
          stroke-dashoffset: 0;
        }
        100% {
          stroke-dashoffset: 420;
        }
      }
      @keyframes snake {
        0% {
          stroke-dashoffset: 0;
        }
        100% {
          stroke-dashoffset: 420;
        }
      }
      @-webkit-keyframes flash {
        0% {
          left: -100px;
        }
        100% {
          left: 100%;
        }
      }
      @keyframes flash {
        0% {
          left: -100px;
        }
        100% {
          left: 100%;
        }
      }
    </style>
  <link href="/theme/{{$theme}}/static/css/n.960f0d5f.css" rel="stylesheet"><link href="/theme/{{$theme}}/static/css/app.9a999ca1.css" rel="stylesheet"></head>
  <body>
    <noscript>
      <strong>Browser Disable JavaScript, Please Enable.</strong>
    </noscript>
    
    @empty($theme_config['loading_text'])
    
    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="hourglassx" x="0px" y="0px" viewBox="0 0 203 203" enable-background="new 0 0 203 203" xml:space="preserve">
      <g>
        <path
          class="hourglass"
          fill="none"
          stroke="#C0E5FA"
          stroke-width="5"
          stroke-linecap="round"
          stroke-miterlimit="10"
          d="M137.5,169.5h-72
		c0-72,63-73,63-126h-54C74.5,96.5,137.5,97.5,137.5,169.5z"
        />
        <path
          class="hourglass"
          fill="none"
          stroke="#74C2EE"
          stroke-width="5"
          stroke-linecap="round"
          stroke-miterlimit="10"
          d="M65.5,34.5h72
		c0,71-63,71-63,126h54C128.5,105.5,65.5,105.5,65.5,34.5z"
        />
      </g>
    </svg>
  
    @endempty
    <div class="loading-user">{!! $theme_config['loading_text'] !!}</div>
  
    <div id="app"></div>
    
      <script>
      window.EnvConfig = {
        serverUrl: '{{ $theme_config['server_url'] }}',
        licenseKey: '{{ $theme_config['license_key'] }}',
        landPage: '{{ $theme_config['land_page'] }}',
        showRegInvite: '{{ $theme_config['show_reg_invite'] }}',
        appTheme: '{{ $theme_config['app_theme'] }}',
        appColor: '{{ $theme_config['app_color'] }}',
        appName: '{{ $title }}',
        appDesc: `{{ $description }}`,
        appLogo: '{{ $logo }}',
        appVersion: '{{ $version }}',
        clientIOS: '{{ $theme_config['client_ios'] }}',
        clientAndroid: '{{ $theme_config['client_android'] }}',
        clientWindows: '{{ $theme_config['client_windows'] }}',
        clientMacOS: '{{ $theme_config['client_macos'] }}',
        clientOpenwrt: '{{ $theme_config['client_openwrt'] }}',
        clientLinux: '{{ $theme_config['client_linux'] }}',
        staticUrl: '/theme/{{ $theme }}/static'
      }
      </script>
    
    <script>
      window.langs = {}
      function isDarkMode() {
        var themeMedia = window.matchMedia('(prefers-color-scheme: dark)')
        var isDark = false
        var localMode = JSON.parse(localStorage.getItem('__AURORA__Darkmode') || '{}').value

        if (localMode !== undefined) {
          isDark = localMode === 'dark'
        } else if (EnvConfig.appTheme === 'dark') {
          isDark = true
        } else if (EnvConfig.appTheme === 'auto') {
          isDark = themeMedia.matches
        }
        return isDark
      }
      if (isDarkMode()) {
        document.body.classList.add('is-darkmode')
      }
      document.body.classList.add(EnvConfig.appColor)

      function getLocaleLang() {
        try {
          var str = localStorage.getItem('__AURORA__Language') || '{}'
          var res = JSON.parse(str).value
          if (res) {
            return res.substring(0, 2) + '-' + res.substring(2)
          }
        } catch (e) {
          return undefined
        }
      }
    </script>
    {!! $theme_config['custom_html'] !!}
    <script src="/theme/{{$theme}}/expose.js?v=20231016235715"></script>
    <script src="/theme/{{$theme}}/static/i18n/zh-CN.js?v=20231016235715"></script>
    <script src="/theme/{{$theme}}/static/i18n/zh-TW.js?v=20231016235715"></script>
    <script src="/theme/{{$theme}}/static/i18n/en-US.js?v=20231016235715"></script>
    <!-- built files will be auto injected -->
    
  @if (file_exists(public_path("/theme/{$theme}/static/custom.js")))
    <script src="/theme/{{$theme}}/static/custom.js?v=20231016235715"></script>
  @endif
  
  <script>(function(e){function n(n){for(var t,u,a=n[0],h=n[1],o=n[2],d=0,k=[];d<a.length;d++)u=a[d],Object.prototype.hasOwnProperty.call(r,u)&&r[u]&&k.push(r[u][0]),r[u]=0;for(t in h)Object.prototype.hasOwnProperty.call(h,t)&&(e[t]=h[t]);i&&i(n);while(k.length)k.shift()();return f.push.apply(f,o||[]),c()}function c(){for(var e,n=0;n<f.length;n++){for(var c=f[n],t=!0,u=1;u<c.length;u++){var a=c[u];0!==r[a]&&(t=!1)}t&&(f.splice(n--,1),e=h(h.s=c[0]))}return e}var t={},u={runtime:0},r={runtime:0},f=[];function a(e){return h.p+"static/js/"+({}[e]||e)+"."+{"chunk-12847396":"db6bd5f6","chunk-2d0aa5b8":"9e7c68a8","chunk-036b66f4":"c9734af7","chunk-658d0690":"5a2c9a96","chunk-64491bb5":"97769d27","chunk-6e83591c":"9e852703","chunk-24f7a0d6":"82dcb5f8","chunk-b83c89e4":"b3b36215","chunk-8c5d225c":"5fe03d99","chunk-7e75c5a6":"ffd2f401","chunk-7f320228":"4ff0d46c","chunk-a5232a28":"9d6b9e1c","chunk-2d21d665":"4d0780e4","chunk-360fb284":"419ae921","chunk-36102f23":"43a45aed","chunk-3e64cb22":"61e039ab","chunk-3fb9b540":"77f048f2","chunk-528af1a6":"c2a676c6","chunk-79e45123":"09e82fd6","chunk-607f2d24":"b5dea78a","chunk-9806f83e":"2ee2d89b","chunk-f19f8d94":"80d5c48e","chunk-58ea483c":"161f784e","chunk-23c167f4":"5378b0b1","chunk-7f630ca2":"79a2145e","chunk-6bb7a56f":"36247e11","chunk-e9f9df92":"7d8b2ee5","chunk-73f884f0":"b5bc7e40","chunk-cf985064":"699ca03d","chunk-d259e240":"8010e5f7"}[e]+".js"}function h(n){if(t[n])return t[n].exports;var c=t[n]={i:n,l:!1,exports:{}};return e[n].call(c.exports,c,c.exports,h),c.l=!0,c.exports}h.e=function(e){var n=[],c={"chunk-12847396":1,"chunk-036b66f4":1,"chunk-658d0690":1,"chunk-64491bb5":1,"chunk-b83c89e4":1,"chunk-7e75c5a6":1,"chunk-7f320228":1,"chunk-a5232a28":1,"chunk-36102f23":1,"chunk-3e64cb22":1,"chunk-3fb9b540":1,"chunk-528af1a6":1,"chunk-f19f8d94":1,"chunk-58ea483c":1,"chunk-23c167f4":1,"chunk-7f630ca2":1,"chunk-e9f9df92":1,"chunk-73f884f0":1,"chunk-cf985064":1,"chunk-d259e240":1};u[e]?n.push(u[e]):0!==u[e]&&c[e]&&n.push(u[e]=new Promise((function(n,c){for(var t="static/css/"+({}[e]||e)+"."+{"chunk-12847396":"a82ec784","chunk-2d0aa5b8":"31d6cfe0","chunk-036b66f4":"9c5371bc","chunk-658d0690":"2ef150e1","chunk-64491bb5":"6f1ab7b9","chunk-6e83591c":"31d6cfe0","chunk-24f7a0d6":"31d6cfe0","chunk-b83c89e4":"64613b28","chunk-8c5d225c":"31d6cfe0","chunk-7e75c5a6":"3c49e56e","chunk-7f320228":"54f4a085","chunk-a5232a28":"3c49e56e","chunk-2d21d665":"31d6cfe0","chunk-360fb284":"31d6cfe0","chunk-36102f23":"47543bb1","chunk-3e64cb22":"3ac0e82e","chunk-3fb9b540":"1661c444","chunk-528af1a6":"b45a908c","chunk-79e45123":"31d6cfe0","chunk-607f2d24":"31d6cfe0","chunk-9806f83e":"31d6cfe0","chunk-f19f8d94":"fc00ebf5","chunk-58ea483c":"c6340983","chunk-23c167f4":"596d89fc","chunk-7f630ca2":"3e588de0","chunk-6bb7a56f":"31d6cfe0","chunk-e9f9df92":"9f3e51a6","chunk-73f884f0":"5aa4a559","chunk-cf985064":"58d9ccef","chunk-d259e240":"2d97752d"}[e]+".css",r=h.p+t,f=document.getElementsByTagName("link"),a=0;a<f.length;a++){var o=f[a],d=o.getAttribute("data-href")||o.getAttribute("href");if("stylesheet"===o.rel&&(d===t||d===r))return n()}var k=document.getElementsByTagName("style");for(a=0;a<k.length;a++){o=k[a],d=o.getAttribute("data-href");if(d===t||d===r)return n()}var i=document.createElement("link");i.rel="stylesheet",i.type="text/css",i.onload=n,i.onerror=function(n){var t=n&&n.target&&n.target.src||r,f=new Error("Loading CSS chunk "+e+" failed.\n("+t+")");f.code="CSS_CHUNK_LOAD_FAILED",f.request=t,delete u[e],i.parentNode.removeChild(i),c(f)},i.href=r;var b=document.getElementsByTagName("head")[0];b.appendChild(i)})).then((function(){u[e]=0})));var t=r[e];if(0!==t)if(t)n.push(t[2]);else{var f=new Promise((function(n,c){t=r[e]=[n,c]}));n.push(t[2]=f);var o,d=document.createElement("script");d.charset="utf-8",d.timeout=120,h.nc&&d.setAttribute("nonce",h.nc),d.src=a(e);var k=new Error;o=function(n){d.onerror=d.onload=null,clearTimeout(i);var c=r[e];if(0!==c){if(c){var t=n&&("load"===n.type?"missing":n.type),u=n&&n.target&&n.target.src;k.message="Loading chunk "+e+" failed.\n("+t+": "+u+")",k.name="ChunkLoadError",k.type=t,k.request=u,c[1](k)}r[e]=void 0}};var i=setTimeout((function(){o({type:"timeout",target:d})}),12e4);d.onerror=d.onload=o,document.head.appendChild(d)}return Promise.all(n)},h.m=e,h.c=t,h.d=function(e,n,c){h.o(e,n)||Object.defineProperty(e,n,{enumerable:!0,get:c})},h.r=function(e){"undefined"!==typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},h.t=function(e,n){if(1&n&&(e=h(e)),8&n)return e;if(4&n&&"object"===typeof e&&e&&e.__esModule)return e;var c=Object.create(null);if(h.r(c),Object.defineProperty(c,"default",{enumerable:!0,value:e}),2&n&&"string"!=typeof e)for(var t in e)h.d(c,t,function(n){return e[n]}.bind(null,t));return c},h.n=function(e){var n=e&&e.__esModule?function(){return e["default"]}:function(){return e};return h.d(n,"a",n),n},h.o=function(e,n){return Object.prototype.hasOwnProperty.call(e,n)},h.p="/theme/{{$theme}}/",h.oe=function(e){throw console.error(e),e};var o=window["webpackJsonp"]=window["webpackJsonp"]||[],d=o.push.bind(o);o.push=n,o=o.slice();for(var k=0;k<o.length;k++)n(o[k]);var i=d;c()})([]);</script><script type="text/javascript" src="/theme/{{$theme}}/static/js/n.e421d864.js"></script><script type="text/javascript" src="/theme/{{$theme}}/static/js/app.e25bbce9.js"></script></body>
</html>
