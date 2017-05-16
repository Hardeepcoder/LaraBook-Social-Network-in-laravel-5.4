require('./bootstrap');

const app = new Vue({
    el: '#app',
    data: {
   msg: 'i am from new:',
   content: '',
   privsteMsgs: [],
   singleMsgs: [],
   msgFrom: ''


 },

 ready: function(){
   this.created();

 },

 created(){
   axios.get('http://localhost/larabook/index.php/getMessages')
        .then(response => {
          console.log(response.data); // show if success
          app.privsteMsgs = response.data; //we are putting data into our posts array
        })
        .catch(function (error) {
          console.log(error); // run if we have error
        });
 },


 methods:{
   messages: function(id){
     axios.get('http://localhost/larabook/index.php/getMessages/' + id)
          .then(response => {
            console.log(response.data); // show if success
           app.singleMsgs = response.data; //we are putting data into our posts array
          })
          .catch(function (error) {
            console.log(error); // run if we have error
          });
   },

   inputHandler(e){
     if(e.keyCode ===13 && !e.shiftKey){
       e.preventDefault();
       this.sendMsg();
     }
   },
   sendMsg(){
     if(this.msgFrom){
       alert(this.msgFrom);
     }
   }






 }

});
