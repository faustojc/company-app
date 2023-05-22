import { jsxs, jsx } from "react/jsx-runtime";
import route from "ziggy-js/src/js/index.js";
import { usePage, Link } from "@inertiajs/react";
import Main from "./Main-d1d0d10c.mjs";
import "react";
import "react-number-format";
import "axios";
function Hero() {
  return /* @__PURE__ */ jsxs("section", { className: "row w-100 px-5 m-0 hero", children: [
    /* @__PURE__ */ jsx("div", { className: "col-lg col-sm-12 py-lg-0 py-5", children: /* @__PURE__ */ jsxs(
      "div",
      {
        className: "row align-items-center justify-content-lg-start justify-content-sm-center align-content-center h-100",
        children: [
          /* @__PURE__ */ jsx("div", { className: "col-12 text-center text-lg-start", children: /* @__PURE__ */ jsx("p", { className: "text-uppercase sub-title", children: "THRIFTED JEANS" }) }),
          /* @__PURE__ */ jsx("div", { className: "col-12 text-center text-lg-start", children: /* @__PURE__ */ jsx("h1", { className: "title", children: "Curated. Premium. Bottoms" }) }),
          /* @__PURE__ */ jsx("div", { className: "col-12 text-center text-lg-start", children: /* @__PURE__ */ jsx("a", { href: route("products.index"), className: "btn btn-dark px-5 py-3 rounded-0", children: "Shop Collection" }) })
        ]
      }
    ) }),
    /* @__PURE__ */ jsx("div", { className: "col-lg col-sm-12 py-lg-0 pt-sm-5", children: /* @__PURE__ */ jsx("div", { className: "d-flex justify-content-center", children: /* @__PURE__ */ jsx("img", { src: "/resource/images/hero.png", className: "img-fluid", alt: "DelargoPH" }) }) })
  ] });
}
function Content({ products }) {
  return /* @__PURE__ */ jsx("section", { className: "pt-5 w-100", children: /* @__PURE__ */ jsx("div", { className: "container", children: /* @__PURE__ */ jsxs("div", { className: "row mb-5", children: [
    /* @__PURE__ */ jsx("div", { className: "col-12 text-center", children: /* @__PURE__ */ jsx("p", { className: "text-uppercase sub-title", children: "Summer Collection" }) }),
    /* @__PURE__ */ jsx("div", { className: "col-12 text-center", children: /* @__PURE__ */ jsx("h2", { className: "title", children: "Popular Pants" }) }),
    /* @__PURE__ */ jsx("div", { className: "d-flex flex-wrap justify-content-center pt-5", children: products.slice(0, 4).map((product) => /* @__PURE__ */ jsxs("div", { className: "card rounded-0 mx-2 mb-4", style: { width: "19rem" }, children: [
      /* @__PURE__ */ jsx(Link, { href: route("products.show", [product]), children: /* @__PURE__ */ jsx("img", { src: product.filepath + product.filename, className: "card-img-top mb-2", alt: product.name }) }),
      /* @__PURE__ */ jsxs("div", { className: "card-body", children: [
        /* @__PURE__ */ jsx("p", { className: "card-title text-uppercase m-0 sub-title", children: product.category }),
        /* @__PURE__ */ jsx(Link, { href: route("products.show", [product]), className: "fw-bold text-body product-name text-decoration-none", children: product.name }),
        /* @__PURE__ */ jsxs("p", { className: "text-success sub-title", children: [
          "P ",
          parseFloat(product.price).toFixed(2)
        ] }),
        /* @__PURE__ */ jsxs(Link, { href: route("products.show", [product]), className: "btn btn-outline-secondary rounded-0 text-uppercase px-2 py-1", children: [
          /* @__PURE__ */ jsx("span", { className: "bi bi-cart me-2" }),
          "Add to Cart"
        ] })
      ] })
    ] }, product.product_id)) })
  ] }) }) });
}
function Feature() {
  return /* @__PURE__ */ jsx("section", { className: "w-100", children: /* @__PURE__ */ jsxs("div", { className: "d-flex flex-wrap justify-content-center mx-100", children: [
    /* @__PURE__ */ jsxs("div", { className: "d-flex flex-column align-items-center p-2", children: [
      /* @__PURE__ */ jsx("div", { className: "mb-2 pb-3", children: /* @__PURE__ */ jsx("img", { src: "/resource/images/delargo-model.jpg", className: "img-fluid", alt: "" }) }),
      /* @__PURE__ */ jsx("div", { className: "mb-2", children: /* @__PURE__ */ jsx("h6", { className: "text-uppercase sub-title", children: "Pants" }) }),
      /* @__PURE__ */ jsx("div", { className: "mb-2", children: /* @__PURE__ */ jsx("h2", { className: "fw-bold", children: "The base collection - Ideal every day." }) }),
      /* @__PURE__ */ jsx("div", { className: "mb-2", children: /* @__PURE__ */ jsx(Link, { href: route("products.index"), className: "btn btn-dark px-4 py-2 rounded-0", children: "Shop Now" }) })
    ] }),
    /* @__PURE__ */ jsx("div", { className: "m-2", children: /* @__PURE__ */ jsx("img", { src: "/resource/images/delargo-model1.jpg", className: "img-fluid", alt: "" }) })
  ] }) });
}
function Home() {
  const { products } = usePage().props;
  return /* @__PURE__ */ jsxs(Main, { children: [
    /* @__PURE__ */ jsx(Home.Hero, {}),
    /* @__PURE__ */ jsx(Home.Content, { products }),
    /* @__PURE__ */ jsx(Home.Feature, {})
  ] });
}
Home.Hero = Hero;
Home.Content = Content;
Home.Feature = Feature;
export {
  Home as default
};
