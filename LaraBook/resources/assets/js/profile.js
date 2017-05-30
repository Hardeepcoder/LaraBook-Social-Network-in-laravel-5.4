require('./bootstrap');

const app = new Vue({
    el: '#app',
    data: {
   msg: 'i am from new:',
   content: '',
   privsteMsgs: [],
   singleMsgs: [],
   msgFrom: '',
   conID: ''

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
           app.conID = response.data[0].conversation_id
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

       axios.post('http://localhost/larabook/index.php/sendMessage', {
              conID: this.conID,
              msg: this.msgFrom
            })
            .then(function (response) {
              console.log(response.data); // show if success

              if(response.status===200){
                app.singleMsgs = response.data;
              }

            })
            .catch(function (error) {
              console.log(error); // run if we have error
            });

     }
   }

 }

});
