import { jsx, jsxs, Fragment } from "react/jsx-runtime";
import route from "ziggy-js/src/js/index.js";
import { Link, usePage } from "@inertiajs/react";
import { useState } from "react";
import { NumericFormat } from "react-number-format";
import axios from "axios";
function AuthDisplay({ username }) {
  if (username) {
    return /* @__PURE__ */ jsx("div", { className: "dropdown", children: /* @__PURE__ */ jsxs("a", { href: "#userDropdown", className: "nav-link", id: "userDropdown", "data-bs-toggle": "dropdown", "aria-expanded": "false", children: [
      /* @__PURE__ */ jsx("svg", { xmlns: "http://www.w3.org/2000/svg", width: "16", height: "16", fill: "currentColor", className: "bi bi-person", viewBox: "0 0 16 16", children: /* @__PURE__ */ jsx("path", { d: "M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" }) }),
      /* @__PURE__ */ jsxs("span", { className: "text-sm-start ms-2 ms-lg-0 fw-bold", children: [
        " ",
        username,
        " "
      ] }),
      /* @__PURE__ */ jsx(
        "div",
        {
          className: "dropdown-menu dropdown-menu-lg-end rounded-0",
          "aria-labelledby": "userDropdown",
          children: /* @__PURE__ */ jsx("a", { href: route("logout"), className: "dropdown-item", children: "Logout" })
        }
      )
    ] }) });
  } else {
    return /* @__PURE__ */ jsxs(Link, { href: route("login"), className: "nav-link", children: [
      /* @__PURE__ */ jsx("svg", { xmlns: "http://www.w3.org/2000/svg", width: "16", height: "16", fill: "currentColor", className: "bi bi-person", viewBox: "0 0 16 16", children: /* @__PURE__ */ jsx("path", { d: "M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" }) }),
      /* @__PURE__ */ jsx("span", { className: "text-sm-start ms-2 ms-lg-0 fw-bold d-md-inline d-lg-none", children: "LOG IN" })
    ] });
  }
}
function Category() {
  return /* @__PURE__ */ jsxs("ul", { className: "navbar-nav mx-auto", children: [
    /* @__PURE__ */ jsx("li", { className: "nav-item mx-2", children: /* @__PURE__ */ jsx("a", { href: route("home"), className: "nav-link fw-light", children: "HOME" }) }),
    /* @__PURE__ */ jsx("li", { className: "nav-item mx-2", children: /* @__PURE__ */ jsx("a", { href: "#", className: "nav-link fw-light", children: "TRENDING" }) }),
    /* @__PURE__ */ jsx("li", { className: "nav-item mx-2", children: /* @__PURE__ */ jsx("a", { href: "#", className: "nav-link fw-light", children: "NEW" }) }),
    /* @__PURE__ */ jsxs("li", { className: "nav-item mx-2 dropdown", children: [
      /* @__PURE__ */ jsx("a", { href: "#categoryDropdown", className: "nav-link fw-light dropdown-toggle", id: "categoryDropdown", "data-bs-toggle": "dropdown", "aria-expanded": "false", children: "CATEGORY" }),
      /* @__PURE__ */ jsxs("div", { className: "dropdown-menu rounded-0 animate__animated animate__fadeInUp animate__faster", id: "categoryDropdown", "aria-labelledby": "categoryDropdown", children: [
        /* @__PURE__ */ jsx("a", { href: route("products.index"), className: "dropdown-item", children: "Cargo Pants" }),
        /* @__PURE__ */ jsx("a", { href: route("products.index"), className: "dropdown-item", children: "Denim Jeans" })
      ] })
    ] }),
    /* @__PURE__ */ jsx("li", { className: "nav-item mx-2", children: /* @__PURE__ */ jsx("a", { href: "#", className: "nav-link fw-light", children: "CONTACT" }) })
  ] });
}
function Navbar() {
  const { orders, customer } = usePage().props;
  return /* @__PURE__ */ jsx("nav", { className: "navbar navbar-expand-lg py-3 sticky-lg-top bg-light-subtle border-bottom", children: /* @__PURE__ */ jsxs("div", { className: "container-fluid", children: [
    /* @__PURE__ */ jsxs("a", { href: "#", className: "navbar-brand", children: [
      /* @__PURE__ */ jsx("img", { src: "/resource/images/logo.png", alt: "logo", style: { width: "50px" } }),
      /* @__PURE__ */ jsx("span", { className: "navbar-brand text-xl-center fw-bold mx-2", children: "Delargo.ph" })
    ] }),
    /* @__PURE__ */ jsx("button", { className: "navbar-toggler float-end border-0", type: "button", "data-bs-toggle": "collapse", "data-bs-target": "#navbar-collapse", "aria-controls": "navbar-collapse", "aria-expanded": "false", "aria-label": "Toggle navigation", children: /* @__PURE__ */ jsx("i", { className: "bi bi-list" }) }),
    /* @__PURE__ */ jsxs("div", { className: "collapse navbar-collapse", id: "navbar-collapse", children: [
      /* @__PURE__ */ jsx(Navbar.Category, {}),
      /* @__PURE__ */ jsxs("div", { className: "d-flex align-items-center justify-content-between justify-content-lg-end mt-2 my-lg-0", children: [
        /* @__PURE__ */ jsx("div", { className: "nav-item mx-lg-3", children: /* @__PURE__ */ jsx(Navbar.AuthDisplay, { username: customer === null ? "" : customer }) }),
        /* @__PURE__ */ jsxs("div", { className: "nav-item mx-lg-3", children: [
          /* @__PURE__ */ jsxs("a", { href: customer ? route("orders.index") : route("login"), className: "nav-link d-lg-none d-md-inline", children: [
            /* @__PURE__ */ jsx("svg", { xmlns: "http://www.w3.org/2000/svg", width: "16", height: "16", fill: "currentColor", className: "bi bi-cart2", viewBox: "0 0 16 16", children: /* @__PURE__ */ jsx("path", { d: "M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" }) }),
            /* @__PURE__ */ jsxs("span", { className: "text-sm-start ms-2 ms-lg-0 fw-bold", children: [
              "VIEW CART",
              /* @__PURE__ */ jsx("span", { className: "badge bg-danger rounded-pill", children: orders ? orders.length : 0 })
            ] })
          ] }),
          /* @__PURE__ */ jsxs("a", { href: "#offcanvasCart", className: "d-none d-lg-inline", role: "button", "data-bs-toggle": "offcanvas", "data-bs-target": "#offcanvasCart", "aria-controls": "offcanvasCart", children: [
            /* @__PURE__ */ jsx("svg", { xmlns: "http://www.w3.org/2000/svg", width: "16", height: "16", fill: "currentColor", className: "bi bi-cart2", viewBox: "0 0 16 16", children: /* @__PURE__ */ jsx("path", { d: "M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" }) }),
            /* @__PURE__ */ jsx("span", { className: "position-absolute translate-middle badge rounded-pill bg-danger", children: orders ? orders.length : 0 })
          ] })
        ] })
      ] })
    ] })
  ] }) });
}
Navbar.Category = Category;
Navbar.AuthDisplay = AuthDisplay;
function Orders({ orders, customer }) {
  const [customerOrders, setCustomerOrders] = useState(orders);
  function increment(order) {
    const updatedTotalPrice = (order.quantity + 1) * order.product.price;
    axios.patch("home/orders/${order}", { quantity: order.quantity + 1, total_price: updatedTotalPrice }).then((response) => {
      setCustomerOrders(
        orders.map((o) => o.customer_id === customer.customer_id && o.product.product_id === order.product_id ? response.data : o)
      );
    });
  }
  function decrement(order) {
    const updatedTotalPrice = (order.quantity - 1) * order.product.price;
    axios.patch("home/orders/${order}", { quantity: order.quantity - 1, total_price: updatedTotalPrice }).then((response) => {
      setCustomerOrders(
        orders.map((o) => o.customer_id === customer.customer_id && o.product.product_id === order.product_id ? response.data : o)
      );
    });
  }
  return /* @__PURE__ */ jsx(Fragment, { children: customerOrders.map((order) => /* @__PURE__ */ jsxs("div", { className: "d-flex mb-3", children: [
    /* @__PURE__ */ jsx("div", { className: "card border-0 px-2", children: /* @__PURE__ */ jsxs("div", { className: "row align-items-center g-0", children: [
      /* @__PURE__ */ jsx("div", { className: "col-md-3", children: /* @__PURE__ */ jsx("img", { src: `${order.product.filepath}${order.product.filename}`, className: "img-fluid", width: "170", alt: "" }) }),
      /* @__PURE__ */ jsx("div", { className: "col", children: /* @__PURE__ */ jsxs("div", { className: "card-body", children: [
        /* @__PURE__ */ jsx("h6", { className: "card-title fw-bolder", children: order.product.name }),
        /* @__PURE__ */ jsxs("p", { className: "card-text", children: [
          " ",
          /* @__PURE__ */ jsx(NumericFormat, { displayType: "text", value: order.product.price, prefix: "₱", thousandSeparator: "true" }),
          " "
        ] }),
        /* @__PURE__ */ jsxs("div", { className: "d-flex", children: [
          /* @__PURE__ */ jsx("button", { className: "btn btn-outline-secondary bi bi-dash rounded-0", type: "button", onClick: () => decrement(order) }),
          /* @__PURE__ */ jsx("input", { className: "text-center form-control rounded-0 w-25", type: "number", min: "1", value: order.quantity }),
          /* @__PURE__ */ jsx("button", { className: "btn btn-outline-secondary bi bi-plus rounded-0", type: "button", onClick: () => increment(order) })
        ] })
      ] }) })
    ] }) }),
    /* @__PURE__ */ jsx("div", { className: "px-2", children: /* @__PURE__ */ jsx("i", { className: "btn bi bi-trash" }) })
  ] }, order.order_id)) });
}
function OffcanvasOrders() {
  const { orders, customer } = usePage().props;
  if (customer !== null) {
    return /* @__PURE__ */ jsx(Fragment, { children: /* @__PURE__ */ jsxs("div", { className: "offcanvas offcanvas-end", tabIndex: "-1", id: "offcanvasCart", "aria-labelledby": "offcanvasCartLabel", children: [
      /* @__PURE__ */ jsxs("div", { className: "offcanvas-header", children: [
        /* @__PURE__ */ jsx("h5", { className: "offcanvas-title nav-link", id: "offcanvasCartLabel", children: "CART LIST" }),
        /* @__PURE__ */ jsx("button", { className: "btn-close", type: "button", "data-bs-dismiss": "offcanvas", "aria-label": "Close" })
      ] }),
      /* @__PURE__ */ jsx("div", { className: "offcanvas-body", children: /* @__PURE__ */ jsx(Orders, { orders, customer }) })
    ] }) });
  } else {
    return /* @__PURE__ */ jsx(Fragment, { children: /* @__PURE__ */ jsxs(
      "div",
      {
        className: "offcanvas offcanvas-end",
        tabIndex: "-1",
        id: "offcanvasCart",
        "aria-labelledby": "offcanvasCartLabel",
        children: [
          /* @__PURE__ */ jsxs("div", { className: "offcanvas-header", children: [
            /* @__PURE__ */ jsx("h5", { className: "offcanvas-title nav-link", id: "offcanvasCartLabel", children: "CART LIST" }),
            /* @__PURE__ */ jsx("button", { className: "btn-close", type: "button", "data-bs-dismiss": "offcanvas", "aria-label": "Close" })
          ] }),
          /* @__PURE__ */ jsx("div", { className: "offcanvas-body", children: "You don't have any added carts" })
        ]
      }
    ) });
  }
}
function Footer() {
  return /* @__PURE__ */ jsxs("footer", { children: [
    /* @__PURE__ */ jsx("div", { className: "bg-body-secondary text-muted py-5", children: /* @__PURE__ */ jsx("div", { className: "container", children: /* @__PURE__ */ jsxs("div", { className: "row", children: [
      /* @__PURE__ */ jsxs("div", { className: "col-lg-5 mb-5 mb-lg-0", children: [
        /* @__PURE__ */ jsx("div", { className: "fw-bold text-uppercase text-lg text-dark mb-3", children: "𝐃𝐞𝐥𝐚𝐫𝐠𝐨 𝐏𝐇 ⌇ 𝐭𝐡𝐫𝐢𝐟𝐭𝐞𝐝 𝐣𝐞𝐚𝐧𝐬" }),
        /* @__PURE__ */ jsx("p", { className: "text-muted", children: "Thrift & Consignment Store collections of curated premium bottoms" }),
        /* @__PURE__ */ jsxs("ul", { className: "list-inline", children: [
          /* @__PURE__ */ jsx("li", { className: "list-inline-item", children: /* @__PURE__ */ jsx("a", { href: "#", className: "text-muted text-primary-hover bi bi-facebook", target: "_blank" }) }),
          /* @__PURE__ */ jsx("li", { className: "list-inline-item", children: /* @__PURE__ */ jsx("a", { href: "#", className: "text-muted text-primary-hover bi bi-twitter", target: "_blank" }) }),
          /* @__PURE__ */ jsx("li", { className: "list-inline-item", children: /* @__PURE__ */ jsx("a", { href: "#", className: "text-muted text-primary-hover bi bi-instagram", target: "_blank" }) })
        ] })
      ] }),
      /* @__PURE__ */ jsxs("div", { className: "col-lg-2 col-md-6 mb-5 mb-lg-0", children: [
        /* @__PURE__ */ jsx("h6", { className: "fw-bold text-dark mb-3", children: "SHOP" }),
        /* @__PURE__ */ jsxs("ul", { className: "list-unstyled", children: [
          /* @__PURE__ */ jsx("li", { children: /* @__PURE__ */ jsx("a", { className: "text-muted text-decoration-none", href: "#", children: "For Men" }) }),
          /* @__PURE__ */ jsx("li", { children: /* @__PURE__ */ jsx("a", { className: "text-muted text-decoration-none", href: "#", children: "For Women" }) }),
          /* @__PURE__ */ jsx("li", { children: /* @__PURE__ */ jsx("a", { className: "text-muted text-decoration-none", href: "#", children: "Shop" }) })
        ] })
      ] }),
      /* @__PURE__ */ jsxs("div", { className: "col", children: [
        /* @__PURE__ */ jsx("h6", { className: "fw-bold text-dark mb-3", children: "OFFERS & SALES" }),
        /* @__PURE__ */ jsx("p", { className: "mb-3", children: "Enter your email to receive news for offers and sales on our products" }),
        /* @__PURE__ */ jsx("form", { method: "post", action: "#", children: /* @__PURE__ */ jsxs("div", { className: "input-group mb-3", children: [
          /* @__PURE__ */ jsx("input", { type: "email", className: "form-control bg-transparent border-secondary rounded-0", placeholder: "Your Email Address", "aria-label": "Your Email Address" }),
          /* @__PURE__ */ jsx("button", { className: "btn btn-outline-secondary rounded-0 bi bi-send-fill", type: "submit", name: "subscribe_email" })
        ] }) })
      ] })
    ] }) }) }),
    /* @__PURE__ */ jsx("div", { className: "fw-light bg-dark-subtle py-4", children: /* @__PURE__ */ jsx("div", { className: "container", children: /* @__PURE__ */ jsx("p", { className: "mb-md-0", children: "© 2023 Delargo PH All rights reserved." }) }) })
  ] });
}
function Main({ children }) {
  return /* @__PURE__ */ jsxs(Fragment, { children: [
    /* @__PURE__ */ jsx(Navbar, {}),
    /* @__PURE__ */ jsx(OffcanvasOrders, {}),
    /* @__PURE__ */ jsx("div", { className: "container-fluid", children }),
    /* @__PURE__ */ jsx(Footer, {})
  ] });
}
export {
  Main as default
};
