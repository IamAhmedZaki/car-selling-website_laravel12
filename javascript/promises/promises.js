// const promiseOne=new Promise(function (resolve,reject){
//     setTimeout(() => {
//         console.log('async task completed')
//         resolve()
//     }, 1000);
// })

// promiseOne.then(()=>{
//      console.log("promise consumed")
// })

// new Promise(function (resolve,reject){
//     setTimeout(() => {
//         console.log('async task completed 2')
//         resolve()
//     }, 1000);
// }).then(()=>{
//     console.log("promise consumed 2")
// })

// const promiseThird=new Promise(function(resolve,reject){
//     setTimeout(function(){
//         console.log("Third async function");
//         resolve({"username":"Ahmed","password":1234})
//     },1000);

// });

// promiseThird.then(function(user){
//     console.log("consuming promises");
//     console.log(user);
    
// })

// const promiseFourth=new Promise(function(resolve,reject){
//     setTimeout(function(){
//     let error=true;
//     if (!error) {
//         resolve({"username":"Ahmed","password":1234,"email":"mahmedzaki670@gmail.com"})
//     }
    
//     else{
//         reject("ERORR: Something went wrong");
//     }
//     },1000)
// })


// promiseFourth.then((user)=>{
//     console.log(user)
//     return user.username
// }).then(function (username) {
//     console.log(username);    
// }).catch(function(error){
//     console.log(error);
    
// });



// const promiseFive= new Promise(function (resolve,reject) {
//     setTimeout(()=>{
//         error=false
//         if(!error){
//             resolve({"username":"Ahmed","password":123})
            
//         }
//         else{
//             reject("ERROR:Something went wrong")
//         }
//     },3000)
// })

// async function consumeFive(){
//     try {
//         const response=await promiseFive
//         console.log(response);
        
//     } catch (error) {
//         console.log(error);
        
//     }
// }

// consumeFive()


// async function consumeFive(){
//     try {
//         const response=await fetch('https://jsonplaceholder.typicode.com/users')
//         const data= await response.json()
//         console.log(data);
        
//     } catch (error) {
//         console.log(error);
        
//     }
// }

// consumeFive()

fetch('https://jsonplaceholder.typicode.com/users').then(function(response){
    return response.json()
}).then(function (data) {
    console.log(data)
}).catch(function (error) {
    console.log(error);
    
})