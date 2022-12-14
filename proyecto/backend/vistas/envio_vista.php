

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Centrando divs</title>
  <link rel="stylesheet" href="./estilos.css" />
  <!-- Cambia el enlace del archivo CSS aquí -->
  <link rel="stylesheet" href="" />
  <style>
    * {
      box-sizing: border-box;
      margin: 0px;
      padding: 0px;
    }

    #contenedorPadre {
        position: relative;
    }

    #contenedorHijo {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, 10%);
    }
    
  </style>
</head>

<body>
    <div class="row col s12" style="background-color: #C1D3DC; color: #02243D;">
    <h4>DATOS CLIENTE</h4>
        
    </div>
    <div  class="row col s12">
        <div class="col s1"></div>
        <div>
            <form class="col s4 center-align">
                <div class="row">
                    <div class="input-field col s6">
                    <input placeholder="Placeholder" id="first_name" type="text" class="validate">
                    <label for="first_name">First Name</label>
                    </div>
                    <div class="input-field col s6">
                    <input id="last_name" type="text" class="validate">
                    <label for="last_name">Last Name</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                    <input disabled value="I am not editable" id="disabled" type="text" class="validate">
                    <label for="disabled">Disabled</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                    <input id="password" type="password" class="validate">
                    <label for="password">Password</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                    <input id="email" type="email" class="validate">
                    <label for="email">Email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                    This is an inline input field:
                    <div class="input-field inline">
                        <input id="email_inline" type="email" class="validate">
                        <label for="email_inline">Email</label>
                        <span class="helper-text" data-error="wrong" data-success="right">Helper text</span>
                    </div>
                    </div>
                </div>
                <div class="row col s12 center-align">
                    <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                        <i class="material-icons right">Confirmar datos</i>
                    </button>
                    <a class="waves-effect waves-light btn">button</a>
                </div>
            </form>
        </div>
        <div class="col s1"></div>
        <div>
            <form class="col s4 center-align">
                <div class="row">
                    <div class="input-field col s6">
                    <input placeholder="Placeholder" id="first_name" type="text" class="validate">
                    <label for="first_name">First Name</label>
                    </div>
                    <div class="input-field col s6">
                    <input id="last_name" type="text" class="validate">
                    <label for="last_name">Last Name</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                    <input disabled value="I am not editable" id="disabled" type="text" class="validate">
                    <label for="disabled">Disabled</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                    <input id="password" type="password" class="validate">
                    <label for="password">Password</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                    <input id="email" type="email" class="validate">
                    <label for="email">Email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                    This is an inline input field:
                    <div class="input-field inline">
                        <input id="email_inline" type="email" class="validate">
                        <label for="email_inline">Email</label>
                        <span class="helper-text" data-error="wrong" data-success="right">Helper text</span>
                    </div>
                    </div>
                </div>
                <div class="row col s2 center-align">
                    <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                        <i class="material-icons right">Confirmar datos</i>
                    </button>
                    <a class="waves-effect waves-light btn">button</a>
                </div>
            </form>
        </div>
        <div class="col s1"></div>
    </div>


</body>
