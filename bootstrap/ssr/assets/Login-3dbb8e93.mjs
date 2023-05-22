import { jsx, Fragment, jsxs } from "react/jsx-runtime";
import Main from "./Main-d1d0d10c.mjs";
import { useState } from "react";
import { usePage, router } from "@inertiajs/react";
import route from "ziggy-js/src/js/index.js";
import "react-number-format";
import "axios";
function Login() {
  const { error } = usePage().props;
  const [wasValidated, setWasValidated] = useState(false);
  const [values, setValues] = useState({
    email: "",
    password: "",
    remember: false
  });
  function handleChange(e) {
    const key = e.target.id;
    const value = e.target.type === "checkbox" ? e.target.checked : e.target.value;
    setValues((values2) => ({
      ...values2,
      [key]: value
    }));
  }
  function handleSubmit(e) {
    e.preventDefault();
    const form = e.currentTarget;
    if (!form.checkValidity()) {
      e.stopPropagation();
      setWasValidated(true);
      return;
    }
    router.post(route("login"), values);
  }
  return /* @__PURE__ */ jsx(Fragment, { children: /* @__PURE__ */ jsx(Main, { children: /* @__PURE__ */ jsx("section", { className: "h-100 py-5", children: /* @__PURE__ */ jsx("div", { className: "row justify-content-center", children: /* @__PURE__ */ jsxs("div", { className: "col-md-10 col-lg-5", children: [
    /* @__PURE__ */ jsx("h5", { className: "mb-4", children: "SIGN IN" }),
    error && /* @__PURE__ */ jsx("div", { className: "my-2 text-danger fw-bold", children: error }),
    /* @__PURE__ */ jsxs("form", { className: `needs-validation ${wasValidated ? "was-validated" : ""}`, onSubmit: handleSubmit, noValidate: true, children: [
      /* @__PURE__ */ jsxs("div", { className: "form-group mb-3", children: [
        /* @__PURE__ */ jsx("label", { htmlFor: "email", className: "form-label fw-bold", children: "Email" }),
        /* @__PURE__ */ jsx("input", { type: "email", id: "email", name: "email", className: "form-control rounded-0", value: values.email, onChange: handleChange, required: true }),
        /* @__PURE__ */ jsx("div", { className: "invalid-feedback", children: "Please enter your email" })
      ] }),
      /* @__PURE__ */ jsxs("div", { className: "form-group mb-3", children: [
        /* @__PURE__ */ jsx("label", { htmlFor: "password", className: "form-label fw-bold", children: "Password" }),
        /* @__PURE__ */ jsx("input", { type: "password", id: "password", name: "password", className: "form-control rounded-0", value: values.password, onChange: handleChange, required: true }),
        /* @__PURE__ */ jsx("div", { className: "invalid-feedback", children: "Please enter your password" })
      ] }),
      /* @__PURE__ */ jsx("div", { className: "form-group mb-3", children: /* @__PURE__ */ jsx("button", { type: "submit", id: "submit", name: "submit", className: "btn btn-outline-dark rounded-0 w-100 px-3", children: "Log in" }) }),
      /* @__PURE__ */ jsxs("div", { className: "d-flex mb-3", children: [
        /* @__PURE__ */ jsxs("div", { className: "col form-check", children: [
          /* @__PURE__ */ jsx("input", { className: "form-check-input", type: "checkbox", value: values.remember ? "checked" : "", id: "remember", onChange: handleChange }),
          /* @__PURE__ */ jsx("label", { className: "form-check-label", htmlFor: "remember", children: "Remember me?" })
        ] }),
        /* @__PURE__ */ jsx("div", { className: "col text-end", children: /* @__PURE__ */ jsx("a", { href: "#", className: "text-decoration-none", children: "Forgot Password?" }) })
      ] })
    ] }),
    /* @__PURE__ */ jsxs("p", { className: "text-center", children: [
      "Don't have account?",
      /* @__PURE__ */ jsx("a", { href: route("register"), className: "text-decoration-none link-info", children: "Sign Up" })
    ] })
  ] }) }) }) }) });
}
export {
  Login as default
};
