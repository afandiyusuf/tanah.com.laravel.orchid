import{p as i,a0 as v,e as u,aS as l,aE as k,aT as h,aU as z,aV as I,aW as B,W as P,j as r,I as V,m as $,b as N,c as T,g as R,r as E,d as F,aX as w,t as U,h as W,aY as j,aZ as D,i as O}from"./index-DcxqciJh.js";const H=i({border:[Boolean,Number,String]},"border");function J(e){let a=arguments.length>1&&arguments[1]!==void 0?arguments[1]:v();return{borderClasses:u(()=>{const t=l(e)?e.value:e.border,s=[];if(t===!0||t==="")s.push(`${a}--border`);else if(typeof t=="string"||t===0)for(const o of String(t).split(" "))s.push(`border-${o}`);return s})}}function x(e){return k(()=>{const a=[],n={};if(e.value.background)if(h(e.value.background)){if(n.backgroundColor=e.value.background,!e.value.text&&z(e.value.background)){const t=I(e.value.background);if(t.a==null||t.a===1){const s=B(t);n.color=s,n.caretColor=s}}}else a.push(`bg-${e.value.background}`);return e.value.text&&(h(e.value.text)?(n.color=e.value.text,n.caretColor=e.value.text):a.push(`text-${e.value.text}`)),{colorClasses:a,colorStyles:n}})}function X(e,a){const n=u(()=>({text:l(e)?e.value:a?e[a]:null})),{colorClasses:t,colorStyles:s}=x(n);return{textColorClasses:t,textColorStyles:s}}function K(e,a){const n=u(()=>({background:l(e)?e.value:a?e[a]:null})),{colorClasses:t,colorStyles:s}=x(n);return{backgroundColorClasses:t,backgroundColorStyles:s}}const L=i({elevation:{type:[Number,String],validator(e){const a=parseInt(e);return!isNaN(a)&&a>=0&&a<=24}}},"elevation");function M(e){return{elevationClasses:u(()=>{const n=l(e)?e.value:e.elevation,t=[];return n==null||t.push(`elevation-${n}`),t})}}const Q=i({rounded:{type:[Boolean,Number,String],default:void 0},tile:Boolean},"rounded");function _(e){let a=arguments.length>1&&arguments[1]!==void 0?arguments[1]:v();return{roundedClasses:u(()=>{const t=l(e)?e.value:e.rounded,s=l(e)?e.value:e.tile,o=[];if(t===!0||t==="")o.push(`${a}--rounded`);else if(typeof t=="string"||t===0)for(const c of String(t).split(" "))o.push(`rounded-${c}`);else(s||t===!1)&&o.push("rounded-0");return o})}}const Y=["x-small","small","default","large","x-large"],Z=i({size:{type:[String,Number],default:"default"}},"size");function q(e){let a=arguments.length>1&&arguments[1]!==void 0?arguments[1]:v();return k(()=>{let n,t;return P(Y,e.size)?n=`${a}--size-${e.size}`:e.size&&(t={width:r(e.size),height:r(e.size)}),{sizeClasses:n,sizeStyles:t}})}const A=i({color:String,disabled:Boolean,start:Boolean,end:Boolean,icon:V,...$(),...Z(),...N({tag:"i"}),...T()},"VIcon"),p=R()({name:"VIcon",props:A(),setup(e,a){let{attrs:n,slots:t}=a;const s=E(),{themeClasses:o}=F(e),{iconData:c}=w(u(()=>s.value||e.icon)),{sizeClasses:C}=q(e),{textColorClasses:S,textColorStyles:y}=X(U(e,"color"));return W(()=>{var m,b;const f=(m=t.default)==null?void 0:m.call(t);f&&(s.value=(b=j(f).filter(g=>g.type===D&&g.children&&typeof g.children=="string")[0])==null?void 0:b.children);const d=!!(n.onClick||n.onClickOnce);return O(c.value.component,{tag:e.tag,icon:c.value.icon,class:["v-icon","notranslate",o.value,C.value,S.value,{"v-icon--clickable":d,"v-icon--disabled":e.disabled,"v-icon--start":e.start,"v-icon--end":e.end},e.class],style:[C.value?void 0:{fontSize:r(e.size),height:r(e.size),width:r(e.size)},y.value,e.style],role:d?"button":void 0,"aria-hidden":!d,tabindex:d?e.disabled?-1:0:void 0},{default:()=>[f]})}),{}}});export{p as V,L as a,Q as b,J as c,M as d,_ as e,x as f,Z as g,q as h,X as i,H as m,K as u};