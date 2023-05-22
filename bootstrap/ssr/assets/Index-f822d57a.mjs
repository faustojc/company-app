import { jsxs, jsx } from "react/jsx-runtime";
import { usePage, Head } from "@inertiajs/react";
import Main from "./Main-d1d0d10c.mjs";
import "ziggy-js/src/js/index.js";
import "react";
import "react-number-format";
import "axios";
function Index() {
  const { orders } = usePage().props;
  return /* @__PURE__ */ jsxs(Main, { children: [
    /* @__PURE__ */ jsx(Head, { title: "Orders" }),
    orders.map((order) => /* @__PURE__ */ jsx("div", { className: "card mb-3", children: /* @__PURE__ */ jsx("div", { className: "card-body", children: /* @__PURE__ */ jsxs("div", { className: "row", children: [
      /* @__PURE__ */ jsxs("div", { className: "col-md-6", children: [
        /* @__PURE__ */ jsx("h5", { className: "card-title", children: order.product.name }),
        /* @__PURE__ */ jsx("p", { className: "card-text", children: order.product.description })
      ] }),
      /* @__PURE__ */ jsxs("div", { className: "col-md-6", children: [
        /* @__PURE__ */ jsxs("p", { className: "card-text", children: [
          "Quantity: ",
          order.quantity
        ] }),
        /* @__PURE__ */ jsxs("p", { className: "card-text", children: [
          "Total: ",
          order.total
        ] })
      ] })
    ] }) }) }, order.id))
  ] });
}
export {
  Index as default
};
