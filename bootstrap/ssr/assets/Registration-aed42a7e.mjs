import { jsx, Fragment, jsxs } from "react/jsx-runtime";
import { useState } from "react";
import { usePage, router } from "@inertiajs/react";
import route from "ziggy-js/src/js/index.js";
import Main from "./Main-d1d0d10c.mjs";
import "react-number-format";
import "axios";
function Registration() {
  const { errors } = usePage().props;
  const regions = [
    "Ilocos (Region I)",
    "Cagayan Valley (Region II)",
    "Central Luzon (Region III)",
    "Calabarzon (Region IV-A)",
    "Mimaropa (Region IV-B)",
    "Bicol Region (Region V)",
    "Western Visayas (Region VI)",
    "Central Visayas (Region VII)",
    "Eastern Visayas (Region VIII)",
    "Zamboanga Peninsula (Region IX)",
    "Northern Mindanao (Region X)",
    "Davao Region (Region XI)",
    "Soccsksargen (Region XII)",
    "Caraga (Region XIII)",
    "Cordillera Administrative Region (CAR)",
    "Autonomous Region in Muslim Mindanao (ARMM)",
    "National Capital Region (NCR)"
  ];
  const [values, setValues] = useState({
    firstname: "",
    lastname: "",
    username: "",
    email: "",
    sex: "male",
    password: "",
    address: "",
    region: regions[0]
  });
  const [wasValidated, setWasValidated] = useState(false);
  function handleChange(e) {
    const key = e.target.id;
    const value = e.target.value;
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
    router.post(route("register"), values);
  }
  return /* @__PURE__ */ jsx(Fragment, { children: /* @__PURE__ */ jsx(Main, { children: /* @__PURE__ */ jsx("section", { className: "h-100 py-5", children: /* @__PURE__ */ jsx("div", { className: "row justify-content-center", children: /* @__PURE__ */ jsxs("div", { className: "col-md-10 col-lg-5", children: [
    /* @__PURE__ */ jsx("h5", { className: "mb-4", children: "SIGN UP" }),
    /* @__PURE__ */ jsxs("form", { className: `row g-3 mb-3 needs-validation ${wasValidated ? "was-validated" : ""}`, onSubmit: handleSubmit, noValidate: true, children: [
      /* @__PURE__ */ jsxs("div", { className: "col-lg-6", children: [
        /* @__PURE__ */ jsx("label", { htmlFor: "firstname", className: "form-label", children: "First Name" }),
        /* @__PURE__ */ jsx("input", { type: "text", id: "firstname", name: "firstname", className: "form-control rounded-0", value: values.firstname, onChange: handleChange, required: true }),
        /* @__PURE__ */ jsx("div", { className: "invalid-feedback", children: "Please enter your first name" })
      ] }),
      /* @__PURE__ */ jsxs("div", { className: "col-lg-6", children: [
        /* @__PURE__ */ jsx("label", { htmlFor: "lastname", className: "form-label", children: "Last Name" }),
        /* @__PURE__ */ jsx("input", { type: "text", id: "lastname", name: "lastname", className: "form-control rounded-0", value: values.lastname, onChange: handleChange, required: true }),
        /* @__PURE__ */ jsx("div", { className: "invalid-feedback", children: "Please enter your last name" })
      ] }),
      /* @__PURE__ */ jsxs("div", { className: "col-12", children: [
        /* @__PURE__ */ jsx("label", { htmlFor: "username", className: "form-label", children: "Username" }),
        /* @__PURE__ */ jsx("input", { type: "text", id: "username", name: "username", className: `form-control rounded-0 ${errors.username ? "is-invalid" : ""}`, value: values.username, onChange: handleChange, required: true }),
        /* @__PURE__ */ jsx("div", { className: "invalid-feedback", children: "Please enter your username" })
      ] }),
      /* @__PURE__ */ jsxs("div", { className: "col-12", children: [
        /* @__PURE__ */ jsx("label", { htmlFor: "email", className: "form-label", children: "Email Address" }),
        /* @__PURE__ */ jsx("input", { type: "email", id: "email", name: "email", className: `form-control rounded-0 ${errors.email ? "is-invalid" : ""}`, value: values.email, onChange: handleChange, required: true }),
        /* @__PURE__ */ jsx("div", { className: "invalid-feedback", children: "Please enter your email address" })
      ] }),
      /* @__PURE__ */ jsxs("div", { className: "col-lg-6", children: [
        /* @__PURE__ */ jsx("label", { htmlFor: "sex", className: "form-label", children: "Sex" }),
        /* @__PURE__ */ jsxs("select", { className: "form-select rounded-0", id: "sex", name: "sex", "aria-label": "Select sex", value: values.sex, onChange: handleChange, children: [
          /* @__PURE__ */ jsx("option", { value: "male", children: "Male" }),
          /* @__PURE__ */ jsx("option", { value: "female", children: "Female" })
        ] })
      ] }),
      /* @__PURE__ */ jsxs("div", { className: "col-lg-6", children: [
        /* @__PURE__ */ jsx("label", { htmlFor: "password", className: "form-label", children: "Password" }),
        /* @__PURE__ */ jsx("input", { type: "password", id: "password", name: "password", className: "form-control rounded-0", value: values.password, onChange: handleChange, required: true }),
        /* @__PURE__ */ jsx("div", { className: "invalid-feedback", children: "Please enter your password" })
      ] }),
      /* @__PURE__ */ jsxs("div", { className: "col-12", children: [
        /* @__PURE__ */ jsx("label", { htmlFor: "address", className: "form-label", children: "Address" }),
        /* @__PURE__ */ jsx("input", { type: "text", id: "address", name: "address", className: "form-control rounded-0", value: values.address, onChange: handleChange, required: true }),
        /* @__PURE__ */ jsx("div", { className: "invalid-feedback", children: "Please enter your address" })
      ] }),
      /* @__PURE__ */ jsxs("div", { className: "col-lg-6", children: [
        /* @__PURE__ */ jsx("label", { htmlFor: "region", className: "form-label", children: "Region" }),
        /* @__PURE__ */ jsx("select", { className: "form-select rounded-0", id: "region", name: "region", "aria-label": "Select region", value: values.region, onChange: handleChange, children: regions.map((region) => /* @__PURE__ */ jsx("option", { value: region, children: region }, region)) })
      ] }),
      /* @__PURE__ */ jsx("div", { className: "col-12", children: /* @__PURE__ */ jsx("button", { type: "submit", className: "btn btn-primary rounded-0", children: "Sign up" }) })
    ] }),
    /* @__PURE__ */ jsxs("p", { className: "text-center", children: [
      "Already have account?",
      /* @__PURE__ */ jsx("a", { href: route("login"), className: "text-decoration-none link-info", children: "Sign in" })
    ] })
  ] }) }) }) }) });
}
export {
  Registration as default
};
