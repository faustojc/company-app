import { jsxs, jsx } from "react/jsx-runtime";
import { usePage, Head, Link, router } from "@inertiajs/react";
import route from "ziggy-js/src/js/index.js";
import Main from "./Main-d1d0d10c.mjs";
import "react";
import "react-number-format";
import "axios";
function Form({ product }) {
  function handleSubmit(e) {
    e.preventDefault();
    router.post("order.store", {
      product
    });
  }
  return /* @__PURE__ */ jsxs("form", { onSubmit: handleSubmit, className: "d-flex", children: [
    /* @__PURE__ */ jsx("div", { className: "mb-3", children: /* @__PURE__ */ jsx("input", { type: "number", id: "quantity", name: "quantity", value: "1", min: "1", max: "99", className: "form-control rounded-0 px-2 py-1" }) }),
    /* @__PURE__ */ jsx("div", { className: "mb-3 ms-3", children: /* @__PURE__ */ jsxs("button", { className: "btn btn-outline-secondary rounded-0 text-uppercase px-2 py-1", type: "submit", name: "submit", children: [
      /* @__PURE__ */ jsx("span", { className: "bi bi-cart me-2" }),
      "Add to Cart"
    ] }) })
  ] });
}
function Info({ product }) {
  return /* @__PURE__ */ jsxs("div", { className: "row flex-wrap justify-content-between g-2", children: [
    /* @__PURE__ */ jsx("div", { className: "col d-flex justify-content-center", children: /* @__PURE__ */ jsx("img", { src: product.filepath + product.filename, className: "img-fluid w-75", alt: "" }) }),
    /* @__PURE__ */ jsxs("div", { className: "col-lg-6 pt-lg-0 pt-4 d-flex flex-column position-sticky", children: [
      /* @__PURE__ */ jsx("div", { className: "mb-4", children: /* @__PURE__ */ jsx("p", { className: "text-uppercase m-0 sub-title", children: product.category }) }),
      /* @__PURE__ */ jsx("div", { className: "mb-2", children: /* @__PURE__ */ jsx("h1", { className: "fw-bolder text-body", children: product.name }) }),
      /* @__PURE__ */ jsx("div", { className: "mb-2", children: /* @__PURE__ */ jsxs("h3", { className: "fw-bold", children: [
        "P",
        parseFloat(product.price).toFixed(2),
        ".00"
      ] }) }),
      /* @__PURE__ */ jsx("div", { className: "mb-3", children: /* @__PURE__ */ jsx("p", { children: product.description }) }),
      /* @__PURE__ */ jsx("div", { className: "text-muted", children: /* @__PURE__ */ jsxs("p", { children: [
        "Flaws: ",
        product.flaw
      ] }) }),
      /* @__PURE__ */ jsx("hr", {}),
      /* @__PURE__ */ jsx(Show.Form, { product })
    ] })
  ] });
}
function Related({ related }) {
  return /* @__PURE__ */ jsxs("div", { className: "card rounded-0 mx-2 mb-4", style: "width: 19rem", children: [
    /* @__PURE__ */ jsx(Link, { href: route("products.show", related), children: /* @__PURE__ */ jsx("img", { src: related.filepath + related.filename, className: "card-img-top mb-2", alt: related.name }) }),
    /* @__PURE__ */ jsxs("div", { className: "card-body", children: [
      /* @__PURE__ */ jsx("p", { className: "card-title text-uppercase m-0 sub-title", children: related.category }),
      /* @__PURE__ */ jsx(Link, { href: route("products.show", related), className: "fw-bold text-body product-name text-decoration-none", children: related.name }),
      /* @__PURE__ */ jsxs("p", { className: "text-success sub-title", children: [
        "P ",
        parseFloat(related.price).toFixed(2),
        " "
      ] }),
      /* @__PURE__ */ jsxs(Link, { href: route("products.show", related), className: "btn btn-outline-secondary rounded-0 text-uppercase px-2 py-1", children: [
        /* @__PURE__ */ jsx("span", { className: "bi bi-cart me-2" }),
        "Add to Cart"
      ] })
    ] })
  ] });
}
function Show() {
  const { product, relatedProducts } = usePage().props;
  return /* @__PURE__ */ jsxs(Main, { children: [
    /* @__PURE__ */ jsx(Head, { title: product.name }),
    /* @__PURE__ */ jsx("section", { className: "w-100 p-5", children: /* @__PURE__ */ jsx(Show.Info, { product }) }),
    /* @__PURE__ */ jsx("section", { className: "pt-5 w-100", children: /* @__PURE__ */ jsx("div", { className: "container", children: /* @__PURE__ */ jsxs("div", { className: "row mb-5", children: [
      /* @__PURE__ */ jsx("div", { className: "col-12 text-center", children: /* @__PURE__ */ jsx("h4", { className: "title", children: "Related Products" }) }),
      /* @__PURE__ */ jsx("div", { className: "d-flex flex-wrap justify-content-center pt-5", children: relatedProducts.map(
        (related) => /* @__PURE__ */ jsx("div", { children: /* @__PURE__ */ jsx(Show.Related, { related }) }, related.product_id)
      ) })
    ] }) }) })
  ] });
}
Show.Form = Form;
Show.Info = Info;
Show.Related = Related;
export {
  Show as default
};
