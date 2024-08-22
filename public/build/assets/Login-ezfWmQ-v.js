import{T as w,o as m,c as n,w as i,a as t,u as s,Z as b,f as y,t as x,g as d,b as a,i as k,d as u,n as h,e as V}from"./app-BVu9A5rz.js";import{_ as v}from"./Checkbox-BraJ5hzv.js";import{_ as B}from"./GuestLayout-C2XRnzJF.js";import{_ as c,a as f,b as p}from"./TextInput-Cv-kDJWG.js";import{P}from"./PrimaryButton-BADyFIBF.js";import"./ApplicationLogo-T__syT7v.js";import"./_plugin-vue_export-helper-DlAUqK2U.js";const $={key:0,class:"mb-4 font-medium text-sm text-green-600"},N={class:"mt-4"},q={class:"block mt-4"},C={class:"flex items-center"},L=a("span",{class:"ms-2 text-sm text-gray-600"},"Remember me",-1),R={class:"flex items-center justify-end mt-4"},D={__name:"Login",props:{canResetPassword:{type:Boolean},status:{type:String}},setup(l){const e=w({email:"",password:"",remember:!1}),_=()=>{e.post(route("login"),{onFinish:()=>e.reset("password")})};return(g,o)=>(m(),n(B,null,{default:i(()=>[t(s(b),{title:"Log in"}),l.status?(m(),y("div",$,x(l.status),1)):d("",!0),a("form",{onSubmit:V(_,["prevent"])},[a("div",null,[t(c,{for:"email",value:"Email"}),t(f,{id:"email",type:"email",class:"mt-1 block w-full",modelValue:s(e).email,"onUpdate:modelValue":o[0]||(o[0]=r=>s(e).email=r),required:"",autofocus:"",autocomplete:"username"},null,8,["modelValue"]),t(p,{class:"mt-2",message:s(e).errors.email},null,8,["message"])]),a("div",N,[t(c,{for:"password",value:"Password"}),t(f,{id:"password",type:"password",class:"mt-1 block w-full",modelValue:s(e).password,"onUpdate:modelValue":o[1]||(o[1]=r=>s(e).password=r),required:"",autocomplete:"current-password"},null,8,["modelValue"]),t(p,{class:"mt-2",message:s(e).errors.password},null,8,["message"])]),a("div",q,[a("label",C,[t(v,{name:"remember",checked:s(e).remember,"onUpdate:checked":o[2]||(o[2]=r=>s(e).remember=r)},null,8,["checked"]),L])]),a("div",R,[l.canResetPassword?(m(),n(s(k),{key:0,href:g.route("password.request"),class:"underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"},{default:i(()=>[u(" Forgot your password? ")]),_:1},8,["href"])):d("",!0),t(P,{class:h(["ms-4",{"opacity-25":s(e).processing}]),disabled:s(e).processing},{default:i(()=>[u(" Log in ")]),_:1},8,["class","disabled"])])],32)]),_:1}))}};export{D as default};
