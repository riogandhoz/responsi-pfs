import{G as l,r as c,j as a,a as s,S as p}from"./app-4e028ceb.js";import{G as u}from"./GuestLayout-d2d13bcd.js";import{T as f,I as w}from"./TextInput-d6041215.js";import{I as h}from"./InputLabel-f90444a9.js";import{P as g}from"./PrimaryButton-55798921.js";import"./ApplicationLogo-02f9419c.js";function I(){const{data:e,setData:t,post:o,processing:m,errors:i,reset:n}=l({password:""});c.useEffect(()=>()=>{n("password")},[]);const d=r=>{t(r.target.name,r.target.value)};return a(u,{children:[s(p,{title:"Confirm Password"}),s("div",{className:"mb-4 text-sm text-gray-600 dark:text-gray-400",children:"This is a secure area of the application. Please confirm your password before continuing."}),a("form",{onSubmit:r=>{r.preventDefault(),o(route("password.confirm"))},children:[a("div",{className:"mt-4",children:[s(h,{htmlFor:"password",value:"Password"}),s(f,{id:"password",type:"password",name:"password",value:e.password,className:"mt-1 block w-full",isFocused:!0,onChange:d}),s(w,{message:i.password,className:"mt-2"})]}),s("div",{className:"flex items-center justify-end mt-4",children:s(g,{className:"ml-4",disabled:m,children:"Confirm"})})]})]})}export{I as default};
