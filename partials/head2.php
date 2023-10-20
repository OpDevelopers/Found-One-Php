<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="/images/foundOne.svg" type="image/x-icon" />
    <title>Found One</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
      crossorigin="anonymous"
    />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="../Css/style.css" />
    <link rel="stylesheet" href="../Css/utils.css" />
    <link rel="stylesheet" href="../Css/displayStyle.css" />
     <style>
      #modalOpen{
  height: 3rem;
  width: 3rem;
  position: fixed;
  right: 2rem;
  bottom: 1rem;
  border-radius: 50%;
}


/* bot styling */


::selection{
  color: #fff;
  background: #007bff;
}

::-webkit-scrollbar{
  width: 3px;
  border-radius: 25px;
}
::-webkit-scrollbar-track{
  background: #f1f1f1;
}
::-webkit-scrollbar-thumb{
  background: #ddd;
}
::-webkit-scrollbar-thumb:hover{
  background: #ccc;
}

.wrapper{
  width: 350px;
  background: #fff;
  border-radius: 5px;
  border: 1px solid lightgrey;
  border-top: 0px;
  margin: auto;
}
.wrapper .title{
  background: #007bff;
  color: #fff;
  font-size: 20px;
  font-weight: 500;
  line-height: 60px;
  text-align: center;
  border-bottom: 1px solid #006fe6;
  border-radius: 5px 5px 0 0;
}
.wrapper .form{
  padding: 20px 15px;
  min-height: 400px;
  max-height: 400px;
  overflow-y: auto;
}
.wrapper .form .inbox{
  width: 100%;
  display: flex;
  align-items: baseline;
}
.wrapper .form .user-inbox{
  justify-content: flex-end;
  margin: 13px 0;
}
.wrapper .form .inbox .icon{
  height: 40px;
  width: 40px;
  color: #fff;
  text-align: center;
  line-height: 40px;
  border-radius: 50%;
  font-size: 18px;
  background: #007bff;
}
.wrapper .form .inbox .msg-header{
  max-width: 53%;
  margin-left: 10px;
}
.form .inbox .msg-header p{
  color: #fff;
  background: #007bff;
  border-radius: 10px;
  padding: 8px 10px;
  font-size: 14px;
  word-break: break-all;
}
.form .user-inbox .msg-header p{
  color: #333;
  background: #efefef;
}
.wrapper .typing-field{
  display: flex;
  height: 60px;
  width: 100%;
  align-items: center;
  justify-content: space-evenly;
  background: #efefef;
  border-top: 1px solid #d9d9d9;
  border-radius: 0 0 5px 5px;
}
.wrapper .typing-field .input-data{
  height: 40px;
  width: 335px;
  position: relative;
}
.wrapper .typing-field .input-data input{
  height: 100%;
  width: 100%;
  outline: none;
  border: 1px solid transparent;
  padding: 0 80px 0 15px;
  border-radius: 3px;
  font-size: 15px;
  background: #fff;
  transition: all 0.3s ease;
}
.typing-field .input-data input:focus{
  border-color: rgba(0,123,255,0.8);
}
.input-data input::placeholder{
  color: #999999;
  transition: all 0.3s ease;
}
.input-data input:focus::placeholder{
  color: #bfbfbf;
}
.wrapper .typing-field .input-data button{
  position: absolute;
  right: 5px;
  top: 50%;
  height: 30px;
  width: 65px;
  color: #fff;
  font-size: 16px;
  cursor: pointer;
  outline: none;
  opacity: 0;
  pointer-events: none;
  border-radius: 3px;
  background: #007bff;
  border: 1px solid #007bff;
  transform: translateY(-50%);
  transition: all 0.3s ease;
}
.wrapper .typing-field .input-data input:valid ~ button{
  opacity: 1;
  pointer-events: auto;
}
.typing-field .input-data button:hover{
  background: #006fef;
}
  </style>
  </head>
  <body>
    <nav class="nav navbar navbar-expand-lg bg-body-tertiary">
      <div class=" container-fluid">
        <a class="navbar-brand" href="/"
          ><img src="../images/foundOne.svg" alt="foundOne"
        /></a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Our Services</a>
            </li>
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                Listings
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">For Sale</a></li>
                <li><a class="dropdown-item" href="#">For Rent</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>

 
  <!-- Button trigger modal -->
<button type="button" id="modalOpen" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
 <img src="/images/icon-6.png" style="height:1.6rem;" alt="">
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="wrapper">
          <div class="title">Found One</div>
          <div class="form">
              <div class="bot-inbox inbox">
                  <div class="icon">
                      <i class="fas fa-user"></i>
                  </div>
                  <div class="msg-header">
                      <p>Hello there, how can I help you?</p>
                  </div>
              </div>
          </div>
          <div class="typing-field">
              <div class="input-data">
                  <input id="data" type="text" placeholder="Type something here.." required>
                  <button id="send-btn">Send</button>
              </div>
          </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>  
      </div>
    </div>
  </div>
</div>


<script>
       $(document).ready(function(){
            $("#send-btn").on("click", function(){
                $value = $("#data").val();
                $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>'+ $value +'</p></div></div>';
                $(".form").append($msg);
                $("#data").val('');
                
                // start ajax code
                $.ajax({
                    url: '/partials/message.php',
                    type: 'POST',
                    data: 'text='+$value,
                    success: function(result){
                        $replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fa fa-user"></i></div><div class="msg-header"><p>'+ result +'</p></div></div>';
                        $(".form").append($replay);
                        // when chat goes down the scroll bar automatically comes to the bottom
                        $(".form").scrollTop($(".form")[0].scrollHeight);
                    }
                });
            });
        });

</script>