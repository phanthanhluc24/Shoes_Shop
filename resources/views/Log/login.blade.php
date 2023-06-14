<link rel="stylesheet" href="{{ asset("css/login.css") }}">
<div class="bt-form-login-simple-1">
  <h1 class="form-heading">
      Welcome Back, Easy Template
  </h1>
  <p class="form-desc">
      Continue with Google or enter your details
  </p>
  <a href="#" class="btn-login-google">
      <svg
          width="25"
          height="24"
          viewBox="0 0 25 24"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
      >
          <path
              d="M22.3055 10.0415L21.5 10.0415L21.5 10L12.5 10L12.5 14L18.1515 14C17.327 16.3285 15.1115 18 12.5 18C9.1865 18 6.5 15.3135 6.5 12C6.5 8.6865 9.1865 6 12.5 6C14.0295 6 15.421 6.577 16.4805 7.5195L19.309 4.691C17.523 3.0265 15.134 2 12.5 2C6.9775 2 2.5 6.4775 2.5 12C2.5 17.5225 6.9775 22 12.5 22C18.0225 22 22.5 17.5225 22.5 12C22.5 11.3295 22.431 10.675 22.3055 10.0415Z"
              fill="#FBC02D"
          ></path>
          <path
              d="M3.65332 7.3455L6.93882 9.755C7.82782 7.554 9.98082 6 12.5003 6C14.0298 6 15.4213 6.577 16.4808 7.5195L19.3093 4.691C17.5233 3.0265 15.1343 2 12.5003 2C8.65932 2 5.32832 4.1685 3.65332 7.3455Z"
              fill="#E53935"
          ></path>
          <path
              d="M12.5002 22C15.0832 22 17.4302 21.0115 19.2047 19.404L16.1097 16.785C15.1057 17.5455 13.8577 18 12.5002 18C9.89916 18 7.69066 16.3415 6.85866 14.027L3.59766 16.5395C5.25266 19.778 8.61366 22 12.5002 22Z"
              fill="#4CAF50"
          ></path>
          <path
              d="M22.3055 10.0415L22.2975 10L21.5 10L12.5 10L12.5 14L18.1515 14C17.7555 15.1185 17.036 16.083 16.108 16.7855C16.1085 16.785 16.109 16.785 16.1095 16.7845L19.2045 19.4035C18.9855 19.6025 22.5 17 22.5 12C22.5 11.3295 22.431 10.675 22.3055 10.0415Z"
              fill="#1565C0"
          ></path>
      </svg>
      Login in with Google
  </a>
  <div class="text-wrap">
      <div class="text-line"></div>
      <p class="text">or</p>
      <div class="text-line"></div>
  </div>
    <form class="form" method="post" action="{{ route("check") }}">
        @csrf
        <div class="form-group">
            <label for="email">Email *</label>
            <input
                type="email"
                name="email"
                id="email"
                placeholder="Email"
                class="form-input"
            />
        </div>
        <div class="form-group">
            <label for="password">Password *</label>
            <input
                type="password"
                name="password"
                id="password"
                placeholder="password"
                class="form-input"
            />
        </div>
        <div class="form-meta">
            <div class="form-remember">
                <input
                    type="checkbox"
                    name="remember-account"
                    id="remember-account"
                />
                <label for="remember-account">
                    Remember for 30 days
                </label>
            </div>
            <a href="#" class="form-link">
                Forgot Password
            </a>
        </div>
        <button type="submit" class="form-btn">
            Login
        </button>
  </form>
  <div class="form-option">
      Dont&#x27;t have am account?
      <a href="{{ route("register") }}">Sign up for free</a>
  </div>
</div>