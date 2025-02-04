import { jsx, jsxs } from "react/jsx-runtime";
import { A as AuthenticatedLayout } from "./AuthenticatedLayout-2kUTmXVA.js";
import "./ApplicationLogo-xMpxFOcX.js";
import "@headlessui/react";
import "@inertiajs/react";
import "react";
function AllUsers({ users }) {
  return /* @__PURE__ */ jsx(AuthenticatedLayout, { children: /* @__PURE__ */ jsxs("div", { className: "max-w-2xl mx-auto p-4 sm:p-6 lg:p-8", children: [
    /* @__PURE__ */ jsx("h1", { children: "All Users" }),
    users.map(
      (user) => /* @__PURE__ */ jsx("h1", { children: user.name })
    )
  ] }) });
}
export {
  AllUsers as default
};
