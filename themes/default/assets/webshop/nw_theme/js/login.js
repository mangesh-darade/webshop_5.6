const searchParams = new URLSearchParams(window.location.search);
const msg = searchParams.get("msg");
if (msg && msg == "auth_success") {
  alert("Logged in successfully");
}
