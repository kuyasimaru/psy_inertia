import{T as b,h as g,k as o,o as x,c as y,w as n,a as t,d,e as V,u as a}from"./app-BVu9A5rz.js";const h={__name:"FormCreate",props:{token:{type:String,required:!0}},setup(c){const e=b({company_name:"",department_name:"",token:c.token}),m=g(()=>e.errors);function p(){e.post(route("member.company.store"),{preserveState:!0,preserveScroll:!0})}return(w,r)=>{const u=o("v-card-title"),l=o("v-text-field"),_=o("v-btn"),i=o("v-form"),v=o("v-card"),f=o("v-container");return x(),y(f,{class:"max-w-md mx-auto"},{default:n(()=>[t(v,{class:"pa-6 rounded-lg shadow-lg"},{default:n(()=>[t(u,{class:"text-h5 font-weight-bold mb-6"},{default:n(()=>[d(" 会社情報登録 ")]),_:1}),t(i,{onSubmit:V(p,["prevent"])},{default:n(()=>[t(l,{modelValue:a(e).company_name,"onUpdate:modelValue":r[0]||(r[0]=s=>a(e).company_name=s),"error-messages":m.value.company_name,label:"会社名",required:"",outlined:"",dense:"",class:"mb-4"},null,8,["modelValue","error-messages"]),t(l,{modelValue:a(e).department_name,"onUpdate:modelValue":r[1]||(r[1]=s=>a(e).department_name=s),"error-messages":m.value.department_name,label:"部署名",required:"",outlined:"",dense:"",class:"mb-6"},null,8,["modelValue","error-messages"]),t(_,{type:"submit",color:"primary",loading:a(e).processing,disabled:a(e).processing,block:"","x-large":"",class:"mt-4"},{default:n(()=>[d(" 送信 ")]),_:1},8,["loading","disabled"])]),_:1})]),_:1})]),_:1})}}};export{h as default};