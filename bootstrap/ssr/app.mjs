import { jsx } from "react/jsx-runtime";
import "bootstrap";
import "bootstrap/dist/js/bootstrap.bundle.min.js";
import axios from "axios";
import { createInertiaApp } from "@inertiajs/react";
import { createRoot } from "react-dom";
window.axios = axios;
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
const app = "";
const style = "";
async function resolvePageComponent(path, pages) {
  const page = pages[path];
  if (typeof page === "undefined") {
    throw new Error(`Page not found: ${path}`);
  }
  return typeof page === "function" ? page() : page;
}
createInertiaApp({
  resolve: (name) => resolvePageComponent(`./Pages/${name}.jsx`, /* @__PURE__ */ Object.assign({ "./Pages/Auth/Login.jsx": () => import("./assets/Login-3dbb8e93.mjs"), "./Pages/Auth/Registration.jsx": () => import("./assets/Registration-aed42a7e.mjs"), "./Pages/Home.jsx": () => import("./assets/Home-662f37fc.mjs"), "./Pages/Layouts/Main.jsx": () => import("./assets/Main-d1d0d10c.mjs"), "./Pages/Orders/Index.jsx": () => import("./assets/Index-f822d57a.mjs"), "./Pages/Product/List.jsx": () => import("./assets/List-e0676d85.mjs"), "./Pages/Product/Show.jsx": () => import("./assets/Show-cacd439f.mjs") })),
  setup({ el, App, props }) {
    createRoot(el).render(/* @__PURE__ */ jsx(App, { ...props }));
  }
});
