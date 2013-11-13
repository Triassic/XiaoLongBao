      <form class="form-signin">
        <h2 class="form-signin-heading">請登錄</h2>
        <input type="text" class="form-control" placeholder="郵件地址" required autofocus>
        <input type="password" class="form-control" placeholder="密碼" required>
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> 記住我
        </label>
        <button class="btn btn-lg btn-primary btn-block" type="submit">登錄</button>
        <a href="<?php echo base_url(); ?>index.php/pages/login/signuppage" class="btn btn-primary btn-lg btn-block" role="button">註冊帳號</a>
      </form>
