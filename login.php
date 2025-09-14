<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login / Cadastro</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="styles/login.css" rel="stylesheet">
</head>
<body>

  <!-- Card de Login -->
  <div class="auth-card active" id="loginCard">
    <h2>Login</h2>
    <form>
      <div class="mb-3">
        <label for="loginEmail" class="form-label">E-mail</label>
        <input type="email" class="form-control" id="loginEmail" placeholder="seuemail@email.com">
      </div>
      <div class="mb-3">
        <label for="loginPassword" class="form-label">Senha</label>
        <input type="password" class="form-control" id="loginPassword" placeholder="••••••••">
      </div>
      <button type="submit" class="btn btn-custom">Entrar</button>
    </form>
    <div class="toggle-link">
      <p>Não tem conta? <a href="#" onclick="showRegister()">Cadastre-se</a></p>
    </div>
  </div>

  <!-- Card de Cadastro -->
  <div class="auth-card" id="registerCard">
    <h2>Cadastro</h2>
    <form>
      <div class="mb-3">
        <label for="registerUsername" class="form-label">Username</label>
        <input type="text" class="form-control" id="registerUsername" placeholder="Seu nome de usuário">
      </div>
      <div class="mb-3">
        <label for="registerEmail" class="form-label">E-mail</label>
        <input type="email" class="form-control" id="registerEmail" placeholder="seuemail@email.com">
      </div>
      <div class="mb-3">
        <label for="registerPassword" class="form-label">Senha</label>
        <input type="password" class="form-control" id="registerPassword" placeholder="••••••••">
      </div>
      <div class="mb-3">
        <label for="confirmPassword" class="form-label">Confirmar Senha</label>
        <input type="password" class="form-control" id="confirmPassword" placeholder="••••••••">
      </div>
      <button type="submit" class="btn btn-custom">Cadastrar</button>
    </form>
    <div class="toggle-link">
      <p>Já tem conta? <a href="#" onclick="showLogin()">Fazer Login</a></p>
    </div>
  </div>

  <script>
    function showRegister() {
      document.getElementById("loginCard").classList.remove("active");
      setTimeout(() => {
        document.getElementById("registerCard").classList.add("active");
      }, 200);
    }
    function showLogin() {
      document.getElementById("registerCard").classList.remove("active");
      setTimeout(() => {
        document.getElementById("loginCard").classList.add("active");
      }, 200);
    }
  </script>

</body>
</html>