import{d as c,a as u,l as x}from"./index.44e508e1.js";import{a as k,b as S}from"./index.592f1baa.js";import{h as T}from"./index.c4f80e29.js";import{e as l}from"./index.439a6e8f.js";import{d as C}from"./store.90b83ad8.js";import{o as v,a as q,b as D}from"./share-url.7b8e083d.js";import"./hoisted.5baa763b.js";import"./hoisted.5ff8ca30.js";import"./hoisted.722e1836.js";import"./lazy.6172b5c8.js";import"./signals.module.629a4080.js";import"./preact.module.31d1e5c5.js";import"./hooks.module.a9f46707.js";import"./preload-helper.50129a7b.js";function b(){import.meta.url,import("data:text/javascript,").catch(()=>1);async function*t(){}b.g=t}const p=(t,e)=>{if(+__PN_DATA__.uid<=0)return e&&e();t()};let m=null;const _=()=>{if(m)return m;const t=document.querySelector("[data-closest]");return m=Object.assign({},t==null?void 0:t.dataset),m};c("click","[data-downld-name]",function(){const t=this.dataset.downldName,e=this.dataset.downldUrl,o=this.dataset.downldSuffix,n=this.dataset.hueid,a=_();if(!t)return;const s=document.getElementById("GoPremiumBtn");p(()=>{switch(n&&l(n),t){case"png":case"rar":case"ppt":case"twibbon":const i=a.fee=="1"&&t==="png";C({type:a.type||"1",btnType:t,rarName:o||"PSD",goPremiumTxt:(s==null?void 0:s.textContent)||"Go Premium",href:e,downUrl:e,fee:i,licenseType:a.licenseType||0},!1);break;case"edit":e&&window.open(e,"_blank");break;case"mobile":const r=document.querySelector("._OE");r&&(r.__top__=r.__top__||r.getBoundingClientRect().top-40+k(),S(r.__top__));break;default:e&&setTimeout(()=>{window.open(e,"_blank")},100);break}},()=>{l("down-btnnologin")})});c("click","[data-share-btn]",function(){const t=this.dataset.shareBtn,e=location.origin+location.pathname,o=L();switch(t){case"pinterest":D(e+"?share=3",o.media,o.word);break;case"facebook":q(e+"?share=2");break;case"twitter":v(e+"?share=1",o.title);break}});function L(){const t={title:"",media:"",word:""},e=document.querySelector("[data-share-media]");if(e){const{shareTitle:o,shareMedia:n,shareWord:a}=e.dataset;t.title=o||"",t.media=n||"",t.word=a||""}return t}const A="._KJ";c("click",A,function(){setTimeout(()=>{l("der-followmain")}),p(()=>{const t=this.dataset.follow,e=this.textContent,o=this.dataset.txt;this.disabled=!0,T.post("/api/async/designer-follow",{id:t}).then(n=>{n.status===200&&(this.textContent=o,this.dataset.txt=e)}).finally(()=>{this.disabled=!1})})});const I="._TE a";c("click","[data-prf-type]",function(){p(()=>{const e=this.dataset.prfType==="enterprise",o=e?"team":"",n=_(),{vip_type:a,enterprise_status:s}=window.__PN_DATA__;n.licenseType==2&&s=="0"?window.open("/team-pay/card?type=2&b=121","_blank"):+a<=0?(u(document,"dialog:toggle",{name:"prf-license",show:!0}),l("prfview-btn"+o)):(this.disabled=!0,u(document,"down:prf",{data:n,isTeam:e,resolve:()=>{this.disabled=!1},reject:()=>{this.disabled=!1}}),l("prfdown-btn"+o))})});c("click",I,function(t){t.preventDefault(),l("relatekeyword-report"),this.href&&setTimeout(()=>{window.open(this.href,"_blank")},100)});const P="._pG ._AJ";c("click",P,function(){const t=this.dataset.id;t&&l("url-similartype-".concat(t))});c("click","._bF>span",function(){u(this.parentElement.querySelector('[data-huejs="der-linkmain"]'),"click")});const y="._JJ",W="._xL",w=()=>{u(document,"dialog:toggle",{name:"PreviewImage",show:!0})},g=t=>{var e;(e=document.querySelector(W))==null||e.classList[t?"add":"remove"]("_Ee")},f=t=>{t.preventDefault()};c("click",y,function(t){f(t),setTimeout(()=>{l("detail-preview-image")},100);const e=document.getElementById("PreviewImage");if(e){if(e.querySelector("img"))return w()}else return;const o=this.querySelector("a"),n=this.querySelector("img");if(!o||!n)return;const a=o.href||n.currentSrc||n.src;if(!a)return;w();const s=o.offsetHeight>o.parentElement.offsetHeight,i=document.createElement("img"),r=s?e:i;r.style.maxWidth=window.innerWidth-40+"px",r.style.maxHeight=window.innerHeight-120+"px",i.className=e.dataset.imgClass||"",i.style.minWidth=s?"640px":"auto",i.alt="",i.oncontextmenu=f,i.onload=i.onabort=i.onerror=()=>{requestAnimationFrame(()=>{g(!0)})},i.src=a,requestAnimationFrame(()=>{g(),e.appendChild(i)})});c("contextmenu",y,f);const F="._tL",B="._uL",N="._vL",H=["_h","_Lp"];U();function U(){if(window.innerWidth<1024)return;const t=document.querySelectorAll(F);for(const e of t){const o=e.querySelector(B),n=e.querySelector(N);if(!o||!n)continue;const a=[...o.children].filter(h=>h!==n),s=a.length,i=a[s-1];if(s<=1||i&&i.offsetTop<=0)continue;const r=getComputedStyle(n,null),d=J({box_w:o.offsetWidth,btn_w:n.offsetWidth,mx:(parseFloat(r.marginLeft)||0)+parseFloat(r.marginRight)||0,len:s,btns:a});E(d,o,n,e)}}function E(t,e,o,n){const a="+"+t.count,s=o.dataset.less,i=n.offsetHeight,r=e.offsetHeight,d=()=>{t.show=!1,o.textContent=a,o.style.removeProperty("width"),e.insertBefore(o,t.el),n.style.cssText+="height:".concat(i,"px;")};x(o,"click",()=>{if(t.show)return d();t.show=!0,e.appendChild(o),o.textContent=s,o.style.width="auto",n.style.cssText+="height:".concat(r,"px;")}),d(),t.count>0&&requestAnimationFrame(()=>{o.classList.remove(...H)})}function J({len:t,mx:e,box_w:o,btn_w:n,btns:a}){const s={el:null,i:0,count:0,show:!1};let i=0;for(let r=0;r<t;r++){const d=a[r];if(i+=d.offsetWidth+e,i+n+e>=o){s.i=r,s.el=d;break}}return s.count=t-s.i,s}export{b as __vite_legacy_guard};