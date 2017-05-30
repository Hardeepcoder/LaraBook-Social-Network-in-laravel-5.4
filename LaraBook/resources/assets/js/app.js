
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data: {
   msg: 'Update New Post:',
   content: '',
   posts: [],
   postId: '',


 },

 ready: function(){
   this.created();
 },

 created(){
   axios.get('http://localhost/larabook/index.php/posts')
        .then(response => {
          console.log(response); // show if success
          this.posts = response.data; //we are putting data into our posts array
        })
        .catch(function (error) {
          console.log(error); // run if we have error
        });
 },


 methods:{

   addPost(){

     //alert('test function');
     axios.post('http://localhost/larabook/index.php/addPost', {
            content: this.content
          })
          .then(function (response) {
            console.log('saved successfully'); // show if success
            if(response.status===200){
              app.posts = response.data;
            }

          })
          .catch(function (error) {
            console.log(error); // run if we have error
          });
   }
 }

});
