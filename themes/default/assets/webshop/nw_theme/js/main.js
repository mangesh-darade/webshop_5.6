if (
  ((function (e, t) {
    "object" == typeof module && "object" == typeof module.exports
      ? (module.exports = e.document
          ? t(e, !0)
          : function (e) {
              if (!e.document)
                throw new Error("jQuery requires a window with a document");
              return t(e);
            })
      : t(e);
  })("undefined" != typeof window ? window : this, function (e, t) {
    var n = [],
      i = n.slice,
      o = n.concat,
      r = n.push,
      s = n.indexOf,
      a = {},
      l = a.toString,
      c = a.hasOwnProperty,
      u = {},
      d = "1.11.3",
      p = function (e, t) {
        return new p.fn.init(e, t);
      },
      f = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g,
      h = /^-ms-/,
      m = /-([\da-z])/gi,
      g = function (e, t) {
        return t.toUpperCase();
      };
    function v(e) {
      var t = "length" in e && e.length,
        n = p.type(e);
      return (
        "function" !== n &&
        !p.isWindow(e) &&
        (!(1 !== e.nodeType || !t) ||
          "array" === n ||
          0 === t ||
          ("number" == typeof t && t > 0 && t - 1 in e))
      );
    }
    (p.fn = p.prototype =
      {
        jquery: d,
        constructor: p,
        selector: "",
        length: 0,
        toArray: function () {
          return i.call(this);
        },
        get: function (e) {
          return null != e
            ? 0 > e
              ? this[e + this.length]
              : this[e]
            : i.call(this);
        },
        pushStack: function (e) {
          var t = p.merge(this.constructor(), e);
          return (t.prevObject = this), (t.context = this.context), t;
        },
        each: function (e, t) {
          return p.each(this, e, t);
        },
        map: function (e) {
          return this.pushStack(
            p.map(this, function (t, n) {
              return e.call(t, n, t);
            })
          );
        },
        slice: function () {
          return this.pushStack(i.apply(this, arguments));
        },
        first: function () {
          return this.eq(0);
        },
        last: function () {
          return this.eq(-1);
        },
        eq: function (e) {
          var t = this.length,
            n = +e + (0 > e ? t : 0);
          return this.pushStack(n >= 0 && t > n ? [this[n]] : []);
        },
        end: function () {
          return this.prevObject || this.constructor(null);
        },
        push: r,
        sort: n.sort,
        splice: n.splice,
      }),
      (p.extend = p.fn.extend =
        function () {
          var e,
            t,
            n,
            i,
            o,
            r,
            s = arguments[0] || {},
            a = 1,
            l = arguments.length,
            c = !1;
          for (
            "boolean" == typeof s && ((c = s), (s = arguments[a] || {}), a++),
              "object" == typeof s || p.isFunction(s) || (s = {}),
              a === l && ((s = this), a--);
            l > a;
            a++
          )
            if (null != (o = arguments[a]))
              for (i in o)
                (e = s[i]),
                  s !== (n = o[i]) &&
                    (c && n && (p.isPlainObject(n) || (t = p.isArray(n)))
                      ? (t
                          ? ((t = !1), (r = e && p.isArray(e) ? e : []))
                          : (r = e && p.isPlainObject(e) ? e : {}),
                        (s[i] = p.extend(c, r, n)))
                      : void 0 !== n && (s[i] = n));
          return s;
        }),
      p.extend({
        expando: "jQuery" + (d + Math.random()).replace(/\D/g, ""),
        isReady: !0,
        error: function (e) {
          throw new Error(e);
        },
        noop: function () {},
        isFunction: function (e) {
          return "function" === p.type(e);
        },
        isArray:
          Array.isArray ||
          function (e) {
            return "array" === p.type(e);
          },
        isWindow: function (e) {
          return null != e && e == e.window;
        },
        isNumeric: function (e) {
          return !p.isArray(e) && e - parseFloat(e) + 1 >= 0;
        },
        isEmptyObject: function (e) {
          var t;
          for (t in e) return !1;
          return !0;
        },
        isPlainObject: function (e) {
          var t;
          if (!e || "object" !== p.type(e) || e.nodeType || p.isWindow(e))
            return !1;
          try {
            if (
              e.constructor &&
              !c.call(e, "constructor") &&
              !c.call(e.constructor.prototype, "isPrototypeOf")
            )
              return !1;
          } catch (e) {
            return !1;
          }
          if (u.ownLast) for (t in e) return c.call(e, t);
          for (t in e);
          return void 0 === t || c.call(e, t);
        },
        type: function (e) {
          return null == e
            ? e + ""
            : "object" == typeof e || "function" == typeof e
            ? a[l.call(e)] || "object"
            : typeof e;
        },
        globalEval: function (t) {
          t &&
            p.trim(t) &&
            (
              e.execScript ||
              function (t) {
                e.eval.call(e, t);
              }
            )(t);
        },
        camelCase: function (e) {
          return e.replace(h, "ms-").replace(m, g);
        },
        nodeName: function (e, t) {
          return e.nodeName && e.nodeName.toLowerCase() === t.toLowerCase();
        },
        each: function (e, t, n) {
          var i = 0,
            o = e.length,
            r = v(e);
          if (n) {
            if (r) for (; o > i && !1 !== t.apply(e[i], n); i++);
            else for (i in e) if (!1 === t.apply(e[i], n)) break;
          } else if (r) for (; o > i && !1 !== t.call(e[i], i, e[i]); i++);
          else for (i in e) if (!1 === t.call(e[i], i, e[i])) break;
          return e;
        },
        trim: function (e) {
          return null == e ? "" : (e + "").replace(f, "");
        },
        makeArray: function (e, t) {
          var n = t || [];
          return (
            null != e &&
              (v(Object(e))
                ? p.merge(n, "string" == typeof e ? [e] : e)
                : r.call(n, e)),
            n
          );
        },
        inArray: function (e, t, n) {
          var i;
          if (t) {
            if (s) return s.call(t, e, n);
            for (
              i = t.length, n = n ? (0 > n ? Math.max(0, i + n) : n) : 0;
              i > n;
              n++
            )
              if (n in t && t[n] === e) return n;
          }
          return -1;
        },
        merge: function (e, t) {
          for (var n = +t.length, i = 0, o = e.length; n > i; ) e[o++] = t[i++];
          if (n != n) for (; void 0 !== t[i]; ) e[o++] = t[i++];
          return (e.length = o), e;
        },
        grep: function (e, t, n) {
          for (var i = [], o = 0, r = e.length, s = !n; r > o; o++)
            !t(e[o], o) !== s && i.push(e[o]);
          return i;
        },
        map: function (e, t, n) {
          var i,
            r = 0,
            s = e.length,
            a = [];
          if (v(e)) for (; s > r; r++) null != (i = t(e[r], r, n)) && a.push(i);
          else for (r in e) null != (i = t(e[r], r, n)) && a.push(i);
          return o.apply([], a);
        },
        guid: 1,
        proxy: function (e, t) {
          var n, o, r;
          return (
            "string" == typeof t && ((r = e[t]), (t = e), (e = r)),
            p.isFunction(e)
              ? ((n = i.call(arguments, 2)),
                ((o = function () {
                  return e.apply(t || this, n.concat(i.call(arguments)));
                }).guid = e.guid =
                  e.guid || p.guid++),
                o)
              : void 0
          );
        },
        now: function () {
          return +new Date();
        },
        support: u,
      }),
      p.each(
        "Boolean Number String Function Array Date RegExp Object Error".split(
          " "
        ),
        function (e, t) {
          a["[object " + t + "]"] = t.toLowerCase();
        }
      );
    var y = (function (e) {
      var t,
        n,
        i,
        o,
        r,
        s,
        a,
        l,
        c,
        u,
        d,
        p,
        f,
        h,
        m,
        g,
        v,
        y,
        b,
        w = "sizzle" + 1 * new Date(),
        x = e.document,
        C = 0,
        T = 0,
        E = se(),
        k = se(),
        _ = se(),
        S = function (e, t) {
          return e === t && (d = !0), 0;
        },
        N = 1 << 31,
        A = {}.hasOwnProperty,
        $ = [],
        I = $.pop,
        D = $.push,
        O = $.push,
        L = $.slice,
        j = function (e, t) {
          for (var n = 0, i = e.length; i > n; n++) if (e[n] === t) return n;
          return -1;
        },
        P =
          "checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped",
        M = "[\\x20\\t\\r\\n\\f]",
        z = "(?:\\\\.|[\\w-]|[^\\x00-\\xa0])+",
        H = z.replace("w", "w#"),
        R =
          "\\[" +
          M +
          "*(" +
          z +
          ")(?:" +
          M +
          "*([*^$|!~]?=)" +
          M +
          "*(?:'((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\"|(" +
          H +
          "))|)" +
          M +
          "*\\]",
        W =
          ":(" +
          z +
          ")(?:\\((('((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\")|((?:\\\\.|[^\\\\()[\\]]|" +
          R +
          ")*)|.*)\\)|)",
        F = new RegExp(M + "+", "g"),
        B = new RegExp("^" + M + "+|((?:^|[^\\\\])(?:\\\\.)*)" + M + "+$", "g"),
        q = new RegExp("^" + M + "*," + M + "*"),
        U = new RegExp("^" + M + "*([>+~]|" + M + ")" + M + "*"),
        V = new RegExp("=" + M + "*([^\\]'\"]*?)" + M + "*\\]", "g"),
        X = new RegExp(W),
        Q = new RegExp("^" + H + "$"),
        G = {
          ID: new RegExp("^#(" + z + ")"),
          CLASS: new RegExp("^\\.(" + z + ")"),
          TAG: new RegExp("^(" + z.replace("w", "w*") + ")"),
          ATTR: new RegExp("^" + R),
          PSEUDO: new RegExp("^" + W),
          CHILD: new RegExp(
            "^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\(" +
              M +
              "*(even|odd|(([+-]|)(\\d*)n|)" +
              M +
              "*(?:([+-]|)" +
              M +
              "*(\\d+)|))" +
              M +
              "*\\)|)",
            "i"
          ),
          bool: new RegExp("^(?:" + P + ")$", "i"),
          needsContext: new RegExp(
            "^" +
              M +
              "*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\(" +
              M +
              "*((?:-\\d)?\\d*)" +
              M +
              "*\\)|)(?=[^-]|$)",
            "i"
          ),
        },
        K = /^(?:input|select|textarea|button)$/i,
        Y = /^h\d$/i,
        Z = /^[^{]+\{\s*\[native \w/,
        J = /^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/,
        ee = /[+~]/,
        te = /'|\\/g,
        ne = new RegExp("\\\\([\\da-f]{1,6}" + M + "?|(" + M + ")|.)", "ig"),
        ie = function (e, t, n) {
          var i = "0x" + t - 65536;
          return i != i || n
            ? t
            : 0 > i
            ? String.fromCharCode(i + 65536)
            : String.fromCharCode((i >> 10) | 55296, (1023 & i) | 56320);
        },
        oe = function () {
          p();
        };
      try {
        O.apply(($ = L.call(x.childNodes)), x.childNodes),
          $[x.childNodes.length].nodeType;
      } catch (e) {
        O = {
          apply: $.length
            ? function (e, t) {
                D.apply(e, L.call(t));
              }
            : function (e, t) {
                for (var n = e.length, i = 0; (e[n++] = t[i++]); );
                e.length = n - 1;
              },
        };
      }
      function re(e, t, i, o) {
        var r, a, c, u, d, h, v, y, C, T;
        if (
          ((t ? t.ownerDocument || t : x) !== f && p(t),
          (i = i || []),
          (u = (t = t || f).nodeType),
          "string" != typeof e || !e || (1 !== u && 9 !== u && 11 !== u))
        )
          return i;
        if (!o && m) {
          if (11 !== u && (r = J.exec(e)))
            if ((c = r[1])) {
              if (9 === u) {
                if (!(a = t.getElementById(c)) || !a.parentNode) return i;
                if (a.id === c) return i.push(a), i;
              } else if (
                t.ownerDocument &&
                (a = t.ownerDocument.getElementById(c)) &&
                b(t, a) &&
                a.id === c
              )
                return i.push(a), i;
            } else {
              if (r[2]) return O.apply(i, t.getElementsByTagName(e)), i;
              if ((c = r[3]) && n.getElementsByClassName)
                return O.apply(i, t.getElementsByClassName(c)), i;
            }
          if (n.qsa && (!g || !g.test(e))) {
            if (
              ((y = v = w),
              (C = t),
              (T = 1 !== u && e),
              1 === u && "object" !== t.nodeName.toLowerCase())
            ) {
              for (
                h = s(e),
                  (v = t.getAttribute("id"))
                    ? (y = v.replace(te, "\\$&"))
                    : t.setAttribute("id", y),
                  y = "[id='" + y + "'] ",
                  d = h.length;
                d--;

              )
                h[d] = y + ge(h[d]);
              (C = (ee.test(e) && he(t.parentNode)) || t), (T = h.join(","));
            }
            if (T)
              try {
                return O.apply(i, C.querySelectorAll(T)), i;
              } catch (e) {
              } finally {
                v || t.removeAttribute("id");
              }
          }
        }
        return l(e.replace(B, "$1"), t, i, o);
      }
      function se() {
        var e = [];
        return function t(n, o) {
          return (
            e.push(n + " ") > i.cacheLength && delete t[e.shift()],
            (t[n + " "] = o)
          );
        };
      }
      function ae(e) {
        return (e[w] = !0), e;
      }
      function le(e) {
        var t = f.createElement("div");
        try {
          return !!e(t);
        } catch (e) {
          return !1;
        } finally {
          t.parentNode && t.parentNode.removeChild(t), (t = null);
        }
      }
      function ce(e, t) {
        for (var n = e.split("|"), o = e.length; o--; ) i.attrHandle[n[o]] = t;
      }
      function ue(e, t) {
        var n = t && e,
          i =
            n &&
            1 === e.nodeType &&
            1 === t.nodeType &&
            (~t.sourceIndex || N) - (~e.sourceIndex || N);
        if (i) return i;
        if (n) for (; (n = n.nextSibling); ) if (n === t) return -1;
        return e ? 1 : -1;
      }
      function de(e) {
        return function (t) {
          return "input" === t.nodeName.toLowerCase() && t.type === e;
        };
      }
      function pe(e) {
        return function (t) {
          var n = t.nodeName.toLowerCase();
          return ("input" === n || "button" === n) && t.type === e;
        };
      }
      function fe(e) {
        return ae(function (t) {
          return (
            (t = +t),
            ae(function (n, i) {
              for (var o, r = e([], n.length, t), s = r.length; s--; )
                n[(o = r[s])] && (n[o] = !(i[o] = n[o]));
            })
          );
        });
      }
      function he(e) {
        return e && void 0 !== e.getElementsByTagName && e;
      }
      for (t in ((n = re.support = {}),
      (r = re.isXML =
        function (e) {
          var t = e && (e.ownerDocument || e).documentElement;
          return !!t && "HTML" !== t.nodeName;
        }),
      (p = re.setDocument =
        function (e) {
          var t,
            o,
            s = e ? e.ownerDocument || e : x;
          return s !== f && 9 === s.nodeType && s.documentElement
            ? ((f = s),
              (h = s.documentElement),
              (o = s.defaultView) &&
                o !== o.top &&
                (o.addEventListener
                  ? o.addEventListener("unload", oe, !1)
                  : o.attachEvent && o.attachEvent("onunload", oe)),
              (m = !r(s)),
              (n.attributes = le(function (e) {
                return (e.className = "i"), !e.getAttribute("className");
              })),
              (n.getElementsByTagName = le(function (e) {
                return (
                  e.appendChild(s.createComment("")),
                  !e.getElementsByTagName("*").length
                );
              })),
              (n.getElementsByClassName = Z.test(s.getElementsByClassName)),
              (n.getById = le(function (e) {
                return (
                  (h.appendChild(e).id = w),
                  !s.getElementsByName || !s.getElementsByName(w).length
                );
              })),
              n.getById
                ? ((i.find.ID = function (e, t) {
                    if (void 0 !== t.getElementById && m) {
                      var n = t.getElementById(e);
                      return n && n.parentNode ? [n] : [];
                    }
                  }),
                  (i.filter.ID = function (e) {
                    var t = e.replace(ne, ie);
                    return function (e) {
                      return e.getAttribute("id") === t;
                    };
                  }))
                : (delete i.find.ID,
                  (i.filter.ID = function (e) {
                    var t = e.replace(ne, ie);
                    return function (e) {
                      var n =
                        void 0 !== e.getAttributeNode &&
                        e.getAttributeNode("id");
                      return n && n.value === t;
                    };
                  })),
              (i.find.TAG = n.getElementsByTagName
                ? function (e, t) {
                    return void 0 !== t.getElementsByTagName
                      ? t.getElementsByTagName(e)
                      : n.qsa
                      ? t.querySelectorAll(e)
                      : void 0;
                  }
                : function (e, t) {
                    var n,
                      i = [],
                      o = 0,
                      r = t.getElementsByTagName(e);
                    if ("*" === e) {
                      for (; (n = r[o++]); ) 1 === n.nodeType && i.push(n);
                      return i;
                    }
                    return r;
                  }),
              (i.find.CLASS =
                n.getElementsByClassName &&
                function (e, t) {
                  return m ? t.getElementsByClassName(e) : void 0;
                }),
              (v = []),
              (g = []),
              (n.qsa = Z.test(s.querySelectorAll)) &&
                (le(function (e) {
                  (h.appendChild(e).innerHTML =
                    "<a id='" +
                    w +
                    "'></a><select id='" +
                    w +
                    "-\f]' msallowcapture=''><option selected=''></option></select>"),
                    e.querySelectorAll("[msallowcapture^='']").length &&
                      g.push("[*^$]=" + M + "*(?:''|\"\")"),
                    e.querySelectorAll("[selected]").length ||
                      g.push("\\[" + M + "*(?:value|" + P + ")"),
                    e.querySelectorAll("[id~=" + w + "-]").length ||
                      g.push("~="),
                    e.querySelectorAll(":checked").length || g.push(":checked"),
                    e.querySelectorAll("a#" + w + "+*").length ||
                      g.push(".#.+[+~]");
                }),
                le(function (e) {
                  var t = s.createElement("input");
                  t.setAttribute("type", "hidden"),
                    e.appendChild(t).setAttribute("name", "D"),
                    e.querySelectorAll("[name=d]").length &&
                      g.push("name" + M + "*[*^$|!~]?="),
                    e.querySelectorAll(":enabled").length ||
                      g.push(":enabled", ":disabled"),
                    e.querySelectorAll("*,:x"),
                    g.push(",.*:");
                })),
              (n.matchesSelector = Z.test(
                (y =
                  h.matches ||
                  h.webkitMatchesSelector ||
                  h.mozMatchesSelector ||
                  h.oMatchesSelector ||
                  h.msMatchesSelector)
              )) &&
                le(function (e) {
                  (n.disconnectedMatch = y.call(e, "div")),
                    y.call(e, "[s!='']:x"),
                    v.push("!=", W);
                }),
              (g = g.length && new RegExp(g.join("|"))),
              (v = v.length && new RegExp(v.join("|"))),
              (t = Z.test(h.compareDocumentPosition)),
              (b =
                t || Z.test(h.contains)
                  ? function (e, t) {
                      var n = 9 === e.nodeType ? e.documentElement : e,
                        i = t && t.parentNode;
                      return (
                        e === i ||
                        !(
                          !i ||
                          1 !== i.nodeType ||
                          !(n.contains
                            ? n.contains(i)
                            : e.compareDocumentPosition &&
                              16 & e.compareDocumentPosition(i))
                        )
                      );
                    }
                  : function (e, t) {
                      if (t)
                        for (; (t = t.parentNode); ) if (t === e) return !0;
                      return !1;
                    }),
              (S = t
                ? function (e, t) {
                    if (e === t) return (d = !0), 0;
                    var i =
                      !e.compareDocumentPosition - !t.compareDocumentPosition;
                    return (
                      i ||
                      (1 &
                        (i =
                          (e.ownerDocument || e) === (t.ownerDocument || t)
                            ? e.compareDocumentPosition(t)
                            : 1) ||
                      (!n.sortDetached && t.compareDocumentPosition(e) === i)
                        ? e === s || (e.ownerDocument === x && b(x, e))
                          ? -1
                          : t === s || (t.ownerDocument === x && b(x, t))
                          ? 1
                          : u
                          ? j(u, e) - j(u, t)
                          : 0
                        : 4 & i
                        ? -1
                        : 1)
                    );
                  }
                : function (e, t) {
                    if (e === t) return (d = !0), 0;
                    var n,
                      i = 0,
                      o = e.parentNode,
                      r = t.parentNode,
                      a = [e],
                      l = [t];
                    if (!o || !r)
                      return e === s
                        ? -1
                        : t === s
                        ? 1
                        : o
                        ? -1
                        : r
                        ? 1
                        : u
                        ? j(u, e) - j(u, t)
                        : 0;
                    if (o === r) return ue(e, t);
                    for (n = e; (n = n.parentNode); ) a.unshift(n);
                    for (n = t; (n = n.parentNode); ) l.unshift(n);
                    for (; a[i] === l[i]; ) i++;
                    return i
                      ? ue(a[i], l[i])
                      : a[i] === x
                      ? -1
                      : l[i] === x
                      ? 1
                      : 0;
                  }),
              s)
            : f;
        }),
      (re.matches = function (e, t) {
        return re(e, null, null, t);
      }),
      (re.matchesSelector = function (e, t) {
        if (
          ((e.ownerDocument || e) !== f && p(e),
          (t = t.replace(V, "='$1']")),
          !(!n.matchesSelector || !m || (v && v.test(t)) || (g && g.test(t))))
        )
          try {
            var i = y.call(e, t);
            if (
              i ||
              n.disconnectedMatch ||
              (e.document && 11 !== e.document.nodeType)
            )
              return i;
          } catch (e) {}
        return re(t, f, null, [e]).length > 0;
      }),
      (re.contains = function (e, t) {
        return (e.ownerDocument || e) !== f && p(e), b(e, t);
      }),
      (re.attr = function (e, t) {
        (e.ownerDocument || e) !== f && p(e);
        var o = i.attrHandle[t.toLowerCase()],
          r = o && A.call(i.attrHandle, t.toLowerCase()) ? o(e, t, !m) : void 0;
        return void 0 !== r
          ? r
          : n.attributes || !m
          ? e.getAttribute(t)
          : (r = e.getAttributeNode(t)) && r.specified
          ? r.value
          : null;
      }),
      (re.error = function (e) {
        throw new Error("Syntax error, unrecognized expression: " + e);
      }),
      (re.uniqueSort = function (e) {
        var t,
          i = [],
          o = 0,
          r = 0;
        if (
          ((d = !n.detectDuplicates),
          (u = !n.sortStable && e.slice(0)),
          e.sort(S),
          d)
        ) {
          for (; (t = e[r++]); ) t === e[r] && (o = i.push(r));
          for (; o--; ) e.splice(i[o], 1);
        }
        return (u = null), e;
      }),
      (o = re.getText =
        function (e) {
          var t,
            n = "",
            i = 0,
            r = e.nodeType;
          if (r) {
            if (1 === r || 9 === r || 11 === r) {
              if ("string" == typeof e.textContent) return e.textContent;
              for (e = e.firstChild; e; e = e.nextSibling) n += o(e);
            } else if (3 === r || 4 === r) return e.nodeValue;
          } else for (; (t = e[i++]); ) n += o(t);
          return n;
        }),
      ((i = re.selectors =
        {
          cacheLength: 50,
          createPseudo: ae,
          match: G,
          attrHandle: {},
          find: {},
          relative: {
            ">": { dir: "parentNode", first: !0 },
            " ": { dir: "parentNode" },
            "+": { dir: "previousSibling", first: !0 },
            "~": { dir: "previousSibling" },
          },
          preFilter: {
            ATTR: function (e) {
              return (
                (e[1] = e[1].replace(ne, ie)),
                (e[3] = (e[3] || e[4] || e[5] || "").replace(ne, ie)),
                "~=" === e[2] && (e[3] = " " + e[3] + " "),
                e.slice(0, 4)
              );
            },
            CHILD: function (e) {
              return (
                (e[1] = e[1].toLowerCase()),
                "nth" === e[1].slice(0, 3)
                  ? (e[3] || re.error(e[0]),
                    (e[4] = +(e[4]
                      ? e[5] + (e[6] || 1)
                      : 2 * ("even" === e[3] || "odd" === e[3]))),
                    (e[5] = +(e[7] + e[8] || "odd" === e[3])))
                  : e[3] && re.error(e[0]),
                e
              );
            },
            PSEUDO: function (e) {
              var t,
                n = !e[6] && e[2];
              return G.CHILD.test(e[0])
                ? null
                : (e[3]
                    ? (e[2] = e[4] || e[5] || "")
                    : n &&
                      X.test(n) &&
                      (t = s(n, !0)) &&
                      (t = n.indexOf(")", n.length - t) - n.length) &&
                      ((e[0] = e[0].slice(0, t)), (e[2] = n.slice(0, t))),
                  e.slice(0, 3));
            },
          },
          filter: {
            TAG: function (e) {
              var t = e.replace(ne, ie).toLowerCase();
              return "*" === e
                ? function () {
                    return !0;
                  }
                : function (e) {
                    return e.nodeName && e.nodeName.toLowerCase() === t;
                  };
            },
            CLASS: function (e) {
              var t = E[e + " "];
              return (
                t ||
                ((t = new RegExp("(^|" + M + ")" + e + "(" + M + "|$)")) &&
                  E(e, function (e) {
                    return t.test(
                      ("string" == typeof e.className && e.className) ||
                        (void 0 !== e.getAttribute &&
                          e.getAttribute("class")) ||
                        ""
                    );
                  }))
              );
            },
            ATTR: function (e, t, n) {
              return function (i) {
                var o = re.attr(i, e);
                return null == o
                  ? "!=" === t
                  : !t ||
                      ((o += ""),
                      "=" === t
                        ? o === n
                        : "!=" === t
                        ? o !== n
                        : "^=" === t
                        ? n && 0 === o.indexOf(n)
                        : "*=" === t
                        ? n && o.indexOf(n) > -1
                        : "$=" === t
                        ? n && o.slice(-n.length) === n
                        : "~=" === t
                        ? (" " + o.replace(F, " ") + " ").indexOf(n) > -1
                        : "|=" === t &&
                          (o === n || o.slice(0, n.length + 1) === n + "-"));
              };
            },
            CHILD: function (e, t, n, i, o) {
              var r = "nth" !== e.slice(0, 3),
                s = "last" !== e.slice(-4),
                a = "of-type" === t;
              return 1 === i && 0 === o
                ? function (e) {
                    return !!e.parentNode;
                  }
                : function (t, n, l) {
                    var c,
                      u,
                      d,
                      p,
                      f,
                      h,
                      m = r !== s ? "nextSibling" : "previousSibling",
                      g = t.parentNode,
                      v = a && t.nodeName.toLowerCase(),
                      y = !l && !a;
                    if (g) {
                      if (r) {
                        for (; m; ) {
                          for (d = t; (d = d[m]); )
                            if (
                              a
                                ? d.nodeName.toLowerCase() === v
                                : 1 === d.nodeType
                            )
                              return !1;
                          h = m = "only" === e && !h && "nextSibling";
                        }
                        return !0;
                      }
                      if (((h = [s ? g.firstChild : g.lastChild]), s && y)) {
                        for (
                          f =
                            (c = (u = g[w] || (g[w] = {}))[e] || [])[0] === C &&
                            c[1],
                            p = c[0] === C && c[2],
                            d = f && g.childNodes[f];
                          (d = (++f && d && d[m]) || (p = f = 0) || h.pop());

                        )
                          if (1 === d.nodeType && ++p && d === t) {
                            u[e] = [C, f, p];
                            break;
                          }
                      } else if (
                        y &&
                        (c = (t[w] || (t[w] = {}))[e]) &&
                        c[0] === C
                      )
                        p = c[1];
                      else
                        for (
                          ;
                          (d = (++f && d && d[m]) || (p = f = 0) || h.pop()) &&
                          ((a
                            ? d.nodeName.toLowerCase() !== v
                            : 1 !== d.nodeType) ||
                            !++p ||
                            (y && ((d[w] || (d[w] = {}))[e] = [C, p]),
                            d !== t));

                        );
                      return (p -= o) === i || (p % i == 0 && p / i >= 0);
                    }
                  };
            },
            PSEUDO: function (e, t) {
              var n,
                o =
                  i.pseudos[e] ||
                  i.setFilters[e.toLowerCase()] ||
                  re.error("unsupported pseudo: " + e);
              return o[w]
                ? o(t)
                : o.length > 1
                ? ((n = [e, e, "", t]),
                  i.setFilters.hasOwnProperty(e.toLowerCase())
                    ? ae(function (e, n) {
                        for (var i, r = o(e, t), s = r.length; s--; )
                          e[(i = j(e, r[s]))] = !(n[i] = r[s]);
                      })
                    : function (e) {
                        return o(e, 0, n);
                      })
                : o;
            },
          },
          pseudos: {
            not: ae(function (e) {
              var t = [],
                n = [],
                i = a(e.replace(B, "$1"));
              return i[w]
                ? ae(function (e, t, n, o) {
                    for (var r, s = i(e, null, o, []), a = e.length; a--; )
                      (r = s[a]) && (e[a] = !(t[a] = r));
                  })
                : function (e, o, r) {
                    return (
                      (t[0] = e), i(t, null, r, n), (t[0] = null), !n.pop()
                    );
                  };
            }),
            has: ae(function (e) {
              return function (t) {
                return re(e, t).length > 0;
              };
            }),
            contains: ae(function (e) {
              return (
                (e = e.replace(ne, ie)),
                function (t) {
                  return (t.textContent || t.innerText || o(t)).indexOf(e) > -1;
                }
              );
            }),
            lang: ae(function (e) {
              return (
                Q.test(e || "") || re.error("unsupported lang: " + e),
                (e = e.replace(ne, ie).toLowerCase()),
                function (t) {
                  var n;
                  do {
                    if (
                      (n = m
                        ? t.lang
                        : t.getAttribute("xml:lang") || t.getAttribute("lang"))
                    )
                      return (
                        (n = n.toLowerCase()) === e || 0 === n.indexOf(e + "-")
                      );
                  } while ((t = t.parentNode) && 1 === t.nodeType);
                  return !1;
                }
              );
            }),
            target: function (t) {
              var n = e.location && e.location.hash;
              return n && n.slice(1) === t.id;
            },
            root: function (e) {
              return e === h;
            },
            focus: function (e) {
              return (
                e === f.activeElement &&
                (!f.hasFocus || f.hasFocus()) &&
                !!(e.type || e.href || ~e.tabIndex)
              );
            },
            enabled: function (e) {
              return !1 === e.disabled;
            },
            disabled: function (e) {
              return !0 === e.disabled;
            },
            checked: function (e) {
              var t = e.nodeName.toLowerCase();
              return (
                ("input" === t && !!e.checked) ||
                ("option" === t && !!e.selected)
              );
            },
            selected: function (e) {
              return (
                e.parentNode && e.parentNode.selectedIndex, !0 === e.selected
              );
            },
            empty: function (e) {
              for (e = e.firstChild; e; e = e.nextSibling)
                if (e.nodeType < 6) return !1;
              return !0;
            },
            parent: function (e) {
              return !i.pseudos.empty(e);
            },
            header: function (e) {
              return Y.test(e.nodeName);
            },
            input: function (e) {
              return K.test(e.nodeName);
            },
            button: function (e) {
              var t = e.nodeName.toLowerCase();
              return ("input" === t && "button" === e.type) || "button" === t;
            },
            text: function (e) {
              var t;
              return (
                "input" === e.nodeName.toLowerCase() &&
                "text" === e.type &&
                (null == (t = e.getAttribute("type")) ||
                  "text" === t.toLowerCase())
              );
            },
            first: fe(function () {
              return [0];
            }),
            last: fe(function (e, t) {
              return [t - 1];
            }),
            eq: fe(function (e, t, n) {
              return [0 > n ? n + t : n];
            }),
            even: fe(function (e, t) {
              for (var n = 0; t > n; n += 2) e.push(n);
              return e;
            }),
            odd: fe(function (e, t) {
              for (var n = 1; t > n; n += 2) e.push(n);
              return e;
            }),
            lt: fe(function (e, t, n) {
              for (var i = 0 > n ? n + t : n; --i >= 0; ) e.push(i);
              return e;
            }),
            gt: fe(function (e, t, n) {
              for (var i = 0 > n ? n + t : n; ++i < t; ) e.push(i);
              return e;
            }),
          },
        }).pseudos.nth = i.pseudos.eq),
      { radio: !0, checkbox: !0, file: !0, password: !0, image: !0 }))
        i.pseudos[t] = de(t);
      for (t in { submit: !0, reset: !0 }) i.pseudos[t] = pe(t);
      function me() {}
      function ge(e) {
        for (var t = 0, n = e.length, i = ""; n > t; t++) i += e[t].value;
        return i;
      }
      function ve(e, t, n) {
        var i = t.dir,
          o = n && "parentNode" === i,
          r = T++;
        return t.first
          ? function (t, n, r) {
              for (; (t = t[i]); ) if (1 === t.nodeType || o) return e(t, n, r);
            }
          : function (t, n, s) {
              var a,
                l,
                c = [C, r];
              if (s) {
                for (; (t = t[i]); )
                  if ((1 === t.nodeType || o) && e(t, n, s)) return !0;
              } else
                for (; (t = t[i]); )
                  if (1 === t.nodeType || o) {
                    if (
                      (a = (l = t[w] || (t[w] = {}))[i]) &&
                      a[0] === C &&
                      a[1] === r
                    )
                      return (c[2] = a[2]);
                    if (((l[i] = c), (c[2] = e(t, n, s)))) return !0;
                  }
            };
      }
      function ye(e) {
        return e.length > 1
          ? function (t, n, i) {
              for (var o = e.length; o--; ) if (!e[o](t, n, i)) return !1;
              return !0;
            }
          : e[0];
      }
      function be(e, t, n, i, o) {
        for (var r, s = [], a = 0, l = e.length, c = null != t; l > a; a++)
          (r = e[a]) && (!n || n(r, i, o)) && (s.push(r), c && t.push(a));
        return s;
      }
      function we(e, t, n, i, o, r) {
        return (
          i && !i[w] && (i = we(i)),
          o && !o[w] && (o = we(o, r)),
          ae(function (r, s, a, l) {
            var c,
              u,
              d,
              p = [],
              f = [],
              h = s.length,
              m =
                r ||
                (function (e, t, n) {
                  for (var i = 0, o = t.length; o > i; i++) re(e, t[i], n);
                  return n;
                })(t || "*", a.nodeType ? [a] : a, []),
              g = !e || (!r && t) ? m : be(m, p, e, a, l),
              v = n ? (o || (r ? e : h || i) ? [] : s) : g;
            if ((n && n(g, v, a, l), i))
              for (c = be(v, f), i(c, [], a, l), u = c.length; u--; )
                (d = c[u]) && (v[f[u]] = !(g[f[u]] = d));
            if (r) {
              if (o || e) {
                if (o) {
                  for (c = [], u = v.length; u--; )
                    (d = v[u]) && c.push((g[u] = d));
                  o(null, (v = []), c, l);
                }
                for (u = v.length; u--; )
                  (d = v[u]) &&
                    (c = o ? j(r, d) : p[u]) > -1 &&
                    (r[c] = !(s[c] = d));
              }
            } else (v = be(v === s ? v.splice(h, v.length) : v)), o ? o(null, s, v, l) : O.apply(s, v);
          })
        );
      }
      function xe(e) {
        for (
          var t,
            n,
            o,
            r = e.length,
            s = i.relative[e[0].type],
            a = s || i.relative[" "],
            l = s ? 1 : 0,
            u = ve(
              function (e) {
                return e === t;
              },
              a,
              !0
            ),
            d = ve(
              function (e) {
                return j(t, e) > -1;
              },
              a,
              !0
            ),
            p = [
              function (e, n, i) {
                var o =
                  (!s && (i || n !== c)) ||
                  ((t = n).nodeType ? u(e, n, i) : d(e, n, i));
                return (t = null), o;
              },
            ];
          r > l;
          l++
        )
          if ((n = i.relative[e[l].type])) p = [ve(ye(p), n)];
          else {
            if ((n = i.filter[e[l].type].apply(null, e[l].matches))[w]) {
              for (o = ++l; r > o && !i.relative[e[o].type]; o++);
              return we(
                l > 1 && ye(p),
                l > 1 &&
                  ge(
                    e
                      .slice(0, l - 1)
                      .concat({ value: " " === e[l - 2].type ? "*" : "" })
                  ).replace(B, "$1"),
                n,
                o > l && xe(e.slice(l, o)),
                r > o && xe((e = e.slice(o))),
                r > o && ge(e)
              );
            }
            p.push(n);
          }
        return ye(p);
      }
      return (
        (me.prototype = i.filters = i.pseudos),
        (i.setFilters = new me()),
        (s = re.tokenize =
          function (e, t) {
            var n,
              o,
              r,
              s,
              a,
              l,
              c,
              u = k[e + " "];
            if (u) return t ? 0 : u.slice(0);
            for (a = e, l = [], c = i.preFilter; a; ) {
              for (s in ((!n || (o = q.exec(a))) &&
                (o && (a = a.slice(o[0].length) || a), l.push((r = []))),
              (n = !1),
              (o = U.exec(a)) &&
                ((n = o.shift()),
                r.push({ value: n, type: o[0].replace(B, " ") }),
                (a = a.slice(n.length))),
              i.filter))
                !(o = G[s].exec(a)) ||
                  (c[s] && !(o = c[s](o))) ||
                  ((n = o.shift()),
                  r.push({ value: n, type: s, matches: o }),
                  (a = a.slice(n.length)));
              if (!n) break;
            }
            return t ? a.length : a ? re.error(e) : k(e, l).slice(0);
          }),
        (a = re.compile =
          function (e, t) {
            var n,
              o,
              r,
              a,
              l,
              u,
              d = [],
              p = [],
              h = _[e + " "];
            if (!h) {
              for (t || (t = s(e)), n = t.length; n--; )
                (h = xe(t[n]))[w] ? d.push(h) : p.push(h);
              (h = _(
                e,
                ((o = p),
                (a = (r = d).length > 0),
                (l = o.length > 0),
                (u = function (e, t, n, s, u) {
                  var d,
                    p,
                    h,
                    m = 0,
                    g = "0",
                    v = e && [],
                    y = [],
                    b = c,
                    w = e || (l && i.find.TAG("*", u)),
                    x = (C += null == b ? 1 : Math.random() || 0.1),
                    T = w.length;
                  for (
                    u && (c = t !== f && t);
                    g !== T && null != (d = w[g]);
                    g++
                  ) {
                    if (l && d) {
                      for (p = 0; (h = o[p++]); )
                        if (h(d, t, n)) {
                          s.push(d);
                          break;
                        }
                      u && (C = x);
                    }
                    a && ((d = !h && d) && m--, e && v.push(d));
                  }
                  if (((m += g), a && g !== m)) {
                    for (p = 0; (h = r[p++]); ) h(v, y, t, n);
                    if (e) {
                      if (m > 0)
                        for (; g--; ) v[g] || y[g] || (y[g] = I.call(s));
                      y = be(y);
                    }
                    O.apply(s, y),
                      u &&
                        !e &&
                        y.length > 0 &&
                        m + r.length > 1 &&
                        re.uniqueSort(s);
                  }
                  return u && ((C = x), (c = b)), v;
                }),
                a ? ae(u) : u)
              )).selector = e;
            }
            return h;
          }),
        (l = re.select =
          function (e, t, o, r) {
            var l,
              c,
              u,
              d,
              p,
              f = "function" == typeof e && e,
              h = !r && s((e = f.selector || e));
            if (((o = o || []), 1 === h.length)) {
              if (
                (c = h[0] = h[0].slice(0)).length > 2 &&
                "ID" === (u = c[0]).type &&
                n.getById &&
                9 === t.nodeType &&
                m &&
                i.relative[c[1].type]
              ) {
                if (
                  !(t = (i.find.ID(u.matches[0].replace(ne, ie), t) || [])[0])
                )
                  return o;
                f && (t = t.parentNode), (e = e.slice(c.shift().value.length));
              }
              for (
                l = G.needsContext.test(e) ? 0 : c.length;
                l-- && ((u = c[l]), !i.relative[(d = u.type)]);

              )
                if (
                  (p = i.find[d]) &&
                  (r = p(
                    u.matches[0].replace(ne, ie),
                    (ee.test(c[0].type) && he(t.parentNode)) || t
                  ))
                ) {
                  if ((c.splice(l, 1), !(e = r.length && ge(c))))
                    return O.apply(o, r), o;
                  break;
                }
            }
            return (
              (f || a(e, h))(
                r,
                t,
                !m,
                o,
                (ee.test(e) && he(t.parentNode)) || t
              ),
              o
            );
          }),
        (n.sortStable = w.split("").sort(S).join("") === w),
        (n.detectDuplicates = !!d),
        p(),
        (n.sortDetached = le(function (e) {
          return 1 & e.compareDocumentPosition(f.createElement("div"));
        })),
        le(function (e) {
          return (
            (e.innerHTML = "<a href='#'></a>"),
            "#" === e.firstChild.getAttribute("href")
          );
        }) ||
          ce("type|href|height|width", function (e, t, n) {
            return n
              ? void 0
              : e.getAttribute(t, "type" === t.toLowerCase() ? 1 : 2);
          }),
        (n.attributes &&
          le(function (e) {
            return (
              (e.innerHTML = "<input/>"),
              e.firstChild.setAttribute("value", ""),
              "" === e.firstChild.getAttribute("value")
            );
          })) ||
          ce("value", function (e, t, n) {
            return n || "input" !== e.nodeName.toLowerCase()
              ? void 0
              : e.defaultValue;
          }),
        le(function (e) {
          return null == e.getAttribute("disabled");
        }) ||
          ce(P, function (e, t, n) {
            var i;
            return n
              ? void 0
              : !0 === e[t]
              ? t.toLowerCase()
              : (i = e.getAttributeNode(t)) && i.specified
              ? i.value
              : null;
          }),
        re
      );
    })(e);
    (p.find = y),
      (p.expr = y.selectors),
      (p.expr[":"] = p.expr.pseudos),
      (p.unique = y.uniqueSort),
      (p.text = y.getText),
      (p.isXMLDoc = y.isXML),
      (p.contains = y.contains);
    var b = p.expr.match.needsContext,
      w = /^<(\w+)\s*\/?>(?:<\/\1>|)$/,
      x = /^.[^:#\[\.,]*$/;
    function C(e, t, n) {
      if (p.isFunction(t))
        return p.grep(e, function (e, i) {
          return !!t.call(e, i, e) !== n;
        });
      if (t.nodeType)
        return p.grep(e, function (e) {
          return (e === t) !== n;
        });
      if ("string" == typeof t) {
        if (x.test(t)) return p.filter(t, e, n);
        t = p.filter(t, e);
      }
      return p.grep(e, function (e) {
        return p.inArray(e, t) >= 0 !== n;
      });
    }
    (p.filter = function (e, t, n) {
      var i = t[0];
      return (
        n && (e = ":not(" + e + ")"),
        1 === t.length && 1 === i.nodeType
          ? p.find.matchesSelector(i, e)
            ? [i]
            : []
          : p.find.matches(
              e,
              p.grep(t, function (e) {
                return 1 === e.nodeType;
              })
            )
      );
    }),
      p.fn.extend({
        find: function (e) {
          var t,
            n = [],
            i = this,
            o = i.length;
          if ("string" != typeof e)
            return this.pushStack(
              p(e).filter(function () {
                for (t = 0; o > t; t++) if (p.contains(i[t], this)) return !0;
              })
            );
          for (t = 0; o > t; t++) p.find(e, i[t], n);
          return (
            ((n = this.pushStack(o > 1 ? p.unique(n) : n)).selector = this
              .selector
              ? this.selector + " " + e
              : e),
            n
          );
        },
        filter: function (e) {
          return this.pushStack(C(this, e || [], !1));
        },
        not: function (e) {
          return this.pushStack(C(this, e || [], !0));
        },
        is: function (e) {
          return !!C(
            this,
            "string" == typeof e && b.test(e) ? p(e) : e || [],
            !1
          ).length;
        },
      });
    var T,
      E = e.document,
      k = /^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]*))$/;
    ((p.fn.init = function (e, t) {
      var n, i;
      if (!e) return this;
      if ("string" == typeof e) {
        if (
          !(n =
            "<" === e.charAt(0) &&
            ">" === e.charAt(e.length - 1) &&
            e.length >= 3
              ? [null, e, null]
              : k.exec(e)) ||
          (!n[1] && t)
        )
          return !t || t.jquery
            ? (t || T).find(e)
            : this.constructor(t).find(e);
        if (n[1]) {
          if (
            ((t = t instanceof p ? t[0] : t),
            p.merge(
              this,
              p.parseHTML(n[1], t && t.nodeType ? t.ownerDocument || t : E, !0)
            ),
            w.test(n[1]) && p.isPlainObject(t))
          )
            for (n in t)
              p.isFunction(this[n]) ? this[n](t[n]) : this.attr(n, t[n]);
          return this;
        }
        if ((i = E.getElementById(n[2])) && i.parentNode) {
          if (i.id !== n[2]) return T.find(e);
          (this.length = 1), (this[0] = i);
        }
        return (this.context = E), (this.selector = e), this;
      }
      return e.nodeType
        ? ((this.context = this[0] = e), (this.length = 1), this)
        : p.isFunction(e)
        ? void 0 !== T.ready
          ? T.ready(e)
          : e(p)
        : (void 0 !== e.selector &&
            ((this.selector = e.selector), (this.context = e.context)),
          p.makeArray(e, this));
    }).prototype = p.fn),
      (T = p(E));
    var _ = /^(?:parents|prev(?:Until|All))/,
      S = { children: !0, contents: !0, next: !0, prev: !0 };
    function N(e, t) {
      do {
        e = e[t];
      } while (e && 1 !== e.nodeType);
      return e;
    }
    p.extend({
      dir: function (e, t, n) {
        for (
          var i = [], o = e[t];
          o &&
          9 !== o.nodeType &&
          (void 0 === n || 1 !== o.nodeType || !p(o).is(n));

        )
          1 === o.nodeType && i.push(o), (o = o[t]);
        return i;
      },
      sibling: function (e, t) {
        for (var n = []; e; e = e.nextSibling)
          1 === e.nodeType && e !== t && n.push(e);
        return n;
      },
    }),
      p.fn.extend({
        has: function (e) {
          var t,
            n = p(e, this),
            i = n.length;
          return this.filter(function () {
            for (t = 0; i > t; t++) if (p.contains(this, n[t])) return !0;
          });
        },
        closest: function (e, t) {
          for (
            var n,
              i = 0,
              o = this.length,
              r = [],
              s =
                b.test(e) || "string" != typeof e ? p(e, t || this.context) : 0;
            o > i;
            i++
          )
            for (n = this[i]; n && n !== t; n = n.parentNode)
              if (
                n.nodeType < 11 &&
                (s
                  ? s.index(n) > -1
                  : 1 === n.nodeType && p.find.matchesSelector(n, e))
              ) {
                r.push(n);
                break;
              }
          return this.pushStack(r.length > 1 ? p.unique(r) : r);
        },
        index: function (e) {
          return e
            ? "string" == typeof e
              ? p.inArray(this[0], p(e))
              : p.inArray(e.jquery ? e[0] : e, this)
            : this[0] && this[0].parentNode
            ? this.first().prevAll().length
            : -1;
        },
        add: function (e, t) {
          return this.pushStack(p.unique(p.merge(this.get(), p(e, t))));
        },
        addBack: function (e) {
          return this.add(
            null == e ? this.prevObject : this.prevObject.filter(e)
          );
        },
      }),
      p.each(
        {
          parent: function (e) {
            var t = e.parentNode;
            return t && 11 !== t.nodeType ? t : null;
          },
          parents: function (e) {
            return p.dir(e, "parentNode");
          },
          parentsUntil: function (e, t, n) {
            return p.dir(e, "parentNode", n);
          },
          next: function (e) {
            return N(e, "nextSibling");
          },
          prev: function (e) {
            return N(e, "previousSibling");
          },
          nextAll: function (e) {
            return p.dir(e, "nextSibling");
          },
          prevAll: function (e) {
            return p.dir(e, "previousSibling");
          },
          nextUntil: function (e, t, n) {
            return p.dir(e, "nextSibling", n);
          },
          prevUntil: function (e, t, n) {
            return p.dir(e, "previousSibling", n);
          },
          siblings: function (e) {
            return p.sibling((e.parentNode || {}).firstChild, e);
          },
          children: function (e) {
            return p.sibling(e.firstChild);
          },
          contents: function (e) {
            return p.nodeName(e, "iframe")
              ? e.contentDocument || e.contentWindow.document
              : p.merge([], e.childNodes);
          },
        },
        function (e, t) {
          p.fn[e] = function (n, i) {
            var o = p.map(this, t, n);
            return (
              "Until" !== e.slice(-5) && (i = n),
              i && "string" == typeof i && (o = p.filter(i, o)),
              this.length > 1 &&
                (S[e] || (o = p.unique(o)), _.test(e) && (o = o.reverse())),
              this.pushStack(o)
            );
          };
        }
      );
    var A,
      $ = /\S+/g,
      I = {};
    function D() {
      E.addEventListener
        ? (E.removeEventListener("DOMContentLoaded", O, !1),
          e.removeEventListener("load", O, !1))
        : (E.detachEvent("onreadystatechange", O), e.detachEvent("onload", O));
    }
    function O() {
      (E.addEventListener ||
        "load" === event.type ||
        "complete" === E.readyState) &&
        (D(), p.ready());
    }
    (p.Callbacks = function (e) {
      var t, n;
      e =
        "string" == typeof e
          ? I[e] ||
            ((n = I[(t = e)] = {}),
            p.each(t.match($) || [], function (e, t) {
              n[t] = !0;
            }),
            n)
          : p.extend({}, e);
      var i,
        o,
        r,
        s,
        a,
        l,
        c = [],
        u = !e.once && [],
        d = function (t) {
          for (
            o = e.memory && t, r = !0, a = l || 0, l = 0, s = c.length, i = !0;
            c && s > a;
            a++
          )
            if (!1 === c[a].apply(t[0], t[1]) && e.stopOnFalse) {
              o = !1;
              break;
            }
          (i = !1),
            c && (u ? u.length && d(u.shift()) : o ? (c = []) : f.disable());
        },
        f = {
          add: function () {
            if (c) {
              var t = c.length;
              !(function t(n) {
                p.each(n, function (n, i) {
                  var o = p.type(i);
                  "function" === o
                    ? (e.unique && f.has(i)) || c.push(i)
                    : i && i.length && "string" !== o && t(i);
                });
              })(arguments),
                i ? (s = c.length) : o && ((l = t), d(o));
            }
            return this;
          },
          remove: function () {
            return (
              c &&
                p.each(arguments, function (e, t) {
                  for (var n; (n = p.inArray(t, c, n)) > -1; )
                    c.splice(n, 1), i && (s >= n && s--, a >= n && a--);
                }),
              this
            );
          },
          has: function (e) {
            return e ? p.inArray(e, c) > -1 : !(!c || !c.length);
          },
          empty: function () {
            return (c = []), (s = 0), this;
          },
          disable: function () {
            return (c = u = o = void 0), this;
          },
          disabled: function () {
            return !c;
          },
          lock: function () {
            return (u = void 0), o || f.disable(), this;
          },
          locked: function () {
            return !u;
          },
          fireWith: function (e, t) {
            return (
              !c ||
                (r && !u) ||
                ((t = [e, (t = t || []).slice ? t.slice() : t]),
                i ? u.push(t) : d(t)),
              this
            );
          },
          fire: function () {
            return f.fireWith(this, arguments), this;
          },
          fired: function () {
            return !!r;
          },
        };
      return f;
    }),
      p.extend({
        Deferred: function (e) {
          var t = [
              ["resolve", "done", p.Callbacks("once memory"), "resolved"],
              ["reject", "fail", p.Callbacks("once memory"), "rejected"],
              ["notify", "progress", p.Callbacks("memory")],
            ],
            n = "pending",
            i = {
              state: function () {
                return n;
              },
              always: function () {
                return o.done(arguments).fail(arguments), this;
              },
              then: function () {
                var e = arguments;
                return p
                  .Deferred(function (n) {
                    p.each(t, function (t, r) {
                      var s = p.isFunction(e[t]) && e[t];
                      o[r[1]](function () {
                        var e = s && s.apply(this, arguments);
                        e && p.isFunction(e.promise)
                          ? e
                              .promise()
                              .done(n.resolve)
                              .fail(n.reject)
                              .progress(n.notify)
                          : n[r[0] + "With"](
                              this === i ? n.promise() : this,
                              s ? [e] : arguments
                            );
                      });
                    }),
                      (e = null);
                  })
                  .promise();
              },
              promise: function (e) {
                return null != e ? p.extend(e, i) : i;
              },
            },
            o = {};
          return (
            (i.pipe = i.then),
            p.each(t, function (e, r) {
              var s = r[2],
                a = r[3];
              (i[r[1]] = s.add),
                a &&
                  s.add(
                    function () {
                      n = a;
                    },
                    t[1 ^ e][2].disable,
                    t[2][2].lock
                  ),
                (o[r[0]] = function () {
                  return (
                    o[r[0] + "With"](this === o ? i : this, arguments), this
                  );
                }),
                (o[r[0] + "With"] = s.fireWith);
            }),
            i.promise(o),
            e && e.call(o, o),
            o
          );
        },
        when: function (e) {
          var t,
            n,
            o,
            r = 0,
            s = i.call(arguments),
            a = s.length,
            l = 1 !== a || (e && p.isFunction(e.promise)) ? a : 0,
            c = 1 === l ? e : p.Deferred(),
            u = function (e, n, o) {
              return function (r) {
                (n[e] = this),
                  (o[e] = arguments.length > 1 ? i.call(arguments) : r),
                  o === t ? c.notifyWith(n, o) : --l || c.resolveWith(n, o);
              };
            };
          if (a > 1)
            for (
              t = new Array(a), n = new Array(a), o = new Array(a);
              a > r;
              r++
            )
              s[r] && p.isFunction(s[r].promise)
                ? s[r]
                    .promise()
                    .done(u(r, o, s))
                    .fail(c.reject)
                    .progress(u(r, n, t))
                : --l;
          return l || c.resolveWith(o, s), c.promise();
        },
      }),
      (p.fn.ready = function (e) {
        return p.ready.promise().done(e), this;
      }),
      p.extend({
        isReady: !1,
        readyWait: 1,
        holdReady: function (e) {
          e ? p.readyWait++ : p.ready(!0);
        },
        ready: function (e) {
          if (!0 === e ? !--p.readyWait : !p.isReady) {
            if (!E.body) return setTimeout(p.ready);
            (p.isReady = !0),
              (!0 !== e && --p.readyWait > 0) ||
                (A.resolveWith(E, [p]),
                p.fn.triggerHandler &&
                  (p(E).triggerHandler("ready"), p(E).off("ready")));
          }
        },
      }),
      (p.ready.promise = function (t) {
        if (!A)
          if (((A = p.Deferred()), "complete" === E.readyState))
            setTimeout(p.ready);
          else if (E.addEventListener)
            E.addEventListener("DOMContentLoaded", O, !1),
              e.addEventListener("load", O, !1);
          else {
            E.attachEvent("onreadystatechange", O), e.attachEvent("onload", O);
            var n = !1;
            try {
              n = null == e.frameElement && E.documentElement;
            } catch (e) {}
            n &&
              n.doScroll &&
              (function e() {
                if (!p.isReady) {
                  try {
                    n.doScroll("left");
                  } catch (t) {
                    return setTimeout(e, 50);
                  }
                  D(), p.ready();
                }
              })();
          }
        return A.promise(t);
      });
    var L,
      j = "undefined";
    for (L in p(u)) break;
    (u.ownLast = "0" !== L),
      (u.inlineBlockNeedsLayout = !1),
      p(function () {
        var e, t, n, i;
        (n = E.getElementsByTagName("body")[0]) &&
          n.style &&
          ((t = E.createElement("div")),
          ((i = E.createElement("div")).style.cssText =
            "position:absolute;border:0;width:0;height:0;top:0;left:-9999px"),
          n.appendChild(i).appendChild(t),
          typeof t.style.zoom !== j &&
            ((t.style.cssText =
              "display:inline;margin:0;border:0;padding:1px;width:1px;zoom:1"),
            (u.inlineBlockNeedsLayout = e = 3 === t.offsetWidth),
            e && (n.style.zoom = 1)),
          n.removeChild(i));
      }),
      (function () {
        var e = E.createElement("div");
        if (null == u.deleteExpando) {
          u.deleteExpando = !0;
          try {
            delete e.test;
          } catch (e) {
            u.deleteExpando = !1;
          }
        }
        e = null;
      })(),
      (p.acceptData = function (e) {
        var t = p.noData[(e.nodeName + " ").toLowerCase()],
          n = +e.nodeType || 1;
        return (
          (1 === n || 9 === n) &&
          (!t || (!0 !== t && e.getAttribute("classid") === t))
        );
      });
    var P = /^(?:\{[\w\W]*\}|\[[\w\W]*\])$/,
      M = /([A-Z])/g;
    function z(e, t, n) {
      if (void 0 === n && 1 === e.nodeType) {
        var i = "data-" + t.replace(M, "-$1").toLowerCase();
        if ("string" == typeof (n = e.getAttribute(i))) {
          try {
            n =
              "true" === n ||
              ("false" !== n &&
                ("null" === n
                  ? null
                  : +n + "" === n
                  ? +n
                  : P.test(n)
                  ? p.parseJSON(n)
                  : n));
          } catch (e) {}
          p.data(e, t, n);
        } else n = void 0;
      }
      return n;
    }
    function H(e) {
      var t;
      for (t in e)
        if (("data" !== t || !p.isEmptyObject(e[t])) && "toJSON" !== t)
          return !1;
      return !0;
    }
    function R(e, t, i, o) {
      if (p.acceptData(e)) {
        var r,
          s,
          a = p.expando,
          l = e.nodeType,
          c = l ? p.cache : e,
          u = l ? e[a] : e[a] && a;
        if (
          (u && c[u] && (o || c[u].data)) ||
          void 0 !== i ||
          "string" != typeof t
        )
          return (
            u || (u = l ? (e[a] = n.pop() || p.guid++) : a),
            c[u] || (c[u] = l ? {} : { toJSON: p.noop }),
            ("object" == typeof t || "function" == typeof t) &&
              (o
                ? (c[u] = p.extend(c[u], t))
                : (c[u].data = p.extend(c[u].data, t))),
            (s = c[u]),
            o || (s.data || (s.data = {}), (s = s.data)),
            void 0 !== i && (s[p.camelCase(t)] = i),
            "string" == typeof t
              ? null == (r = s[t]) && (r = s[p.camelCase(t)])
              : (r = s),
            r
          );
      }
    }
    function W(e, t, n) {
      if (p.acceptData(e)) {
        var i,
          o,
          r = e.nodeType,
          s = r ? p.cache : e,
          a = r ? e[p.expando] : p.expando;
        if (s[a]) {
          if (t && (i = n ? s[a] : s[a].data)) {
            o = (t = p.isArray(t)
              ? t.concat(p.map(t, p.camelCase))
              : t in i || (t = p.camelCase(t)) in i
              ? [t]
              : t.split(" ")).length;
            for (; o--; ) delete i[t[o]];
            if (n ? !H(i) : !p.isEmptyObject(i)) return;
          }
          (n || (delete s[a].data, H(s[a]))) &&
            (r
              ? p.cleanData([e], !0)
              : u.deleteExpando || s != s.window
              ? delete s[a]
              : (s[a] = null));
        }
      }
    }
    p.extend({
      cache: {},
      noData: {
        "applet ": !0,
        "embed ": !0,
        "object ": "clsid:D27CDB6E-AE6D-11cf-96B8-444553540000",
      },
      hasData: function (e) {
        return (
          !!(e = e.nodeType ? p.cache[e[p.expando]] : e[p.expando]) && !H(e)
        );
      },
      data: function (e, t, n) {
        return R(e, t, n);
      },
      removeData: function (e, t) {
        return W(e, t);
      },
      _data: function (e, t, n) {
        return R(e, t, n, !0);
      },
      _removeData: function (e, t) {
        return W(e, t, !0);
      },
    }),
      p.fn.extend({
        data: function (e, t) {
          var n,
            i,
            o,
            r = this[0],
            s = r && r.attributes;
          if (void 0 === e) {
            if (
              this.length &&
              ((o = p.data(r)), 1 === r.nodeType && !p._data(r, "parsedAttrs"))
            ) {
              for (n = s.length; n--; )
                s[n] &&
                  0 === (i = s[n].name).indexOf("data-") &&
                  z(r, (i = p.camelCase(i.slice(5))), o[i]);
              p._data(r, "parsedAttrs", !0);
            }
            return o;
          }
          return "object" == typeof e
            ? this.each(function () {
                p.data(this, e);
              })
            : arguments.length > 1
            ? this.each(function () {
                p.data(this, e, t);
              })
            : r
            ? z(r, e, p.data(r, e))
            : void 0;
        },
        removeData: function (e) {
          return this.each(function () {
            p.removeData(this, e);
          });
        },
      }),
      p.extend({
        queue: function (e, t, n) {
          var i;
          return e
            ? ((t = (t || "fx") + "queue"),
              (i = p._data(e, t)),
              n &&
                (!i || p.isArray(n)
                  ? (i = p._data(e, t, p.makeArray(n)))
                  : i.push(n)),
              i || [])
            : void 0;
        },
        dequeue: function (e, t) {
          t = t || "fx";
          var n = p.queue(e, t),
            i = n.length,
            o = n.shift(),
            r = p._queueHooks(e, t);
          "inprogress" === o && ((o = n.shift()), i--),
            o &&
              ("fx" === t && n.unshift("inprogress"),
              delete r.stop,
              o.call(
                e,
                function () {
                  p.dequeue(e, t);
                },
                r
              )),
            !i && r && r.empty.fire();
        },
        _queueHooks: function (e, t) {
          var n = t + "queueHooks";
          return (
            p._data(e, n) ||
            p._data(e, n, {
              empty: p.Callbacks("once memory").add(function () {
                p._removeData(e, t + "queue"), p._removeData(e, n);
              }),
            })
          );
        },
      }),
      p.fn.extend({
        queue: function (e, t) {
          var n = 2;
          return (
            "string" != typeof e && ((t = e), (e = "fx"), n--),
            arguments.length < n
              ? p.queue(this[0], e)
              : void 0 === t
              ? this
              : this.each(function () {
                  var n = p.queue(this, e, t);
                  p._queueHooks(this, e),
                    "fx" === e && "inprogress" !== n[0] && p.dequeue(this, e);
                })
          );
        },
        dequeue: function (e) {
          return this.each(function () {
            p.dequeue(this, e);
          });
        },
        clearQueue: function (e) {
          return this.queue(e || "fx", []);
        },
        promise: function (e, t) {
          var n,
            i = 1,
            o = p.Deferred(),
            r = this,
            s = this.length,
            a = function () {
              --i || o.resolveWith(r, [r]);
            };
          for (
            "string" != typeof e && ((t = e), (e = void 0)), e = e || "fx";
            s--;

          )
            (n = p._data(r[s], e + "queueHooks")) &&
              n.empty &&
              (i++, n.empty.add(a));
          return a(), o.promise(t);
        },
      });
    var F = /[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source,
      B = ["Top", "Right", "Bottom", "Left"],
      q = function (e, t) {
        return (
          (e = t || e),
          "none" === p.css(e, "display") || !p.contains(e.ownerDocument, e)
        );
      },
      U = (p.access = function (e, t, n, i, o, r, s) {
        var a = 0,
          l = e.length,
          c = null == n;
        if ("object" === p.type(n))
          for (a in ((o = !0), n)) p.access(e, t, a, n[a], !0, r, s);
        else if (
          void 0 !== i &&
          ((o = !0),
          p.isFunction(i) || (s = !0),
          c &&
            (s
              ? (t.call(e, i), (t = null))
              : ((c = t),
                (t = function (e, t, n) {
                  return c.call(p(e), n);
                }))),
          t)
        )
          for (; l > a; a++) t(e[a], n, s ? i : i.call(e[a], a, t(e[a], n)));
        return o ? e : c ? t.call(e) : l ? t(e[0], n) : r;
      }),
      V = /^(?:checkbox|radio)$/i;
    !(function () {
      var e = E.createElement("input"),
        t = E.createElement("div"),
        n = E.createDocumentFragment();
      if (
        ((t.innerHTML =
          "  <link/><table></table><a href='/a'>a</a><input type='checkbox'/>"),
        (u.leadingWhitespace = 3 === t.firstChild.nodeType),
        (u.tbody = !t.getElementsByTagName("tbody").length),
        (u.htmlSerialize = !!t.getElementsByTagName("link").length),
        (u.html5Clone =
          "<:nav></:nav>" !== E.createElement("nav").cloneNode(!0).outerHTML),
        (e.type = "checkbox"),
        (e.checked = !0),
        n.appendChild(e),
        (u.appendChecked = e.checked),
        (t.innerHTML = "<textarea>x</textarea>"),
        (u.noCloneChecked = !!t.cloneNode(!0).lastChild.defaultValue),
        n.appendChild(t),
        (t.innerHTML = "<input type='radio' checked='checked' name='t'/>"),
        (u.checkClone = t.cloneNode(!0).cloneNode(!0).lastChild.checked),
        (u.noCloneEvent = !0),
        t.attachEvent &&
          (t.attachEvent("onclick", function () {
            u.noCloneEvent = !1;
          }),
          t.cloneNode(!0).click()),
        null == u.deleteExpando)
      ) {
        u.deleteExpando = !0;
        try {
          delete t.test;
        } catch (e) {
          u.deleteExpando = !1;
        }
      }
    })(),
      (function () {
        var t,
          n,
          i = E.createElement("div");
        for (t in { submit: !0, change: !0, focusin: !0 })
          (n = "on" + t),
            (u[t + "Bubbles"] = n in e) ||
              (i.setAttribute(n, "t"),
              (u[t + "Bubbles"] = !1 === i.attributes[n].expando));
        i = null;
      })();
    var X = /^(?:input|select|textarea)$/i,
      Q = /^key/,
      G = /^(?:mouse|pointer|contextmenu)|click/,
      K = /^(?:focusinfocus|focusoutblur)$/,
      Y = /^([^.]*)(?:\.(.+)|)$/;
    function Z() {
      return !0;
    }
    function J() {
      return !1;
    }
    function ee() {
      try {
        return E.activeElement;
      } catch (e) {}
    }
    function te(e) {
      var t = ne.split("|"),
        n = e.createDocumentFragment();
      if (n.createElement) for (; t.length; ) n.createElement(t.pop());
      return n;
    }
    (p.event = {
      global: {},
      add: function (e, t, n, i, o) {
        var r,
          s,
          a,
          l,
          c,
          u,
          d,
          f,
          h,
          m,
          g,
          v = p._data(e);
        if (v) {
          for (
            n.handler && ((n = (l = n).handler), (o = l.selector)),
              n.guid || (n.guid = p.guid++),
              (s = v.events) || (s = v.events = {}),
              (u = v.handle) ||
                ((u = v.handle =
                  function (e) {
                    return typeof p === j || (e && p.event.triggered === e.type)
                      ? void 0
                      : p.event.dispatch.apply(u.elem, arguments);
                  }).elem = e),
              a = (t = (t || "").match($) || [""]).length;
            a--;

          )
            (h = g = (r = Y.exec(t[a]) || [])[1]),
              (m = (r[2] || "").split(".").sort()),
              h &&
                ((c = p.event.special[h] || {}),
                (h = (o ? c.delegateType : c.bindType) || h),
                (c = p.event.special[h] || {}),
                (d = p.extend(
                  {
                    type: h,
                    origType: g,
                    data: i,
                    handler: n,
                    guid: n.guid,
                    selector: o,
                    needsContext: o && p.expr.match.needsContext.test(o),
                    namespace: m.join("."),
                  },
                  l
                )),
                (f = s[h]) ||
                  (((f = s[h] = []).delegateCount = 0),
                  (c.setup && !1 !== c.setup.call(e, i, m, u)) ||
                    (e.addEventListener
                      ? e.addEventListener(h, u, !1)
                      : e.attachEvent && e.attachEvent("on" + h, u))),
                c.add &&
                  (c.add.call(e, d),
                  d.handler.guid || (d.handler.guid = n.guid)),
                o ? f.splice(f.delegateCount++, 0, d) : f.push(d),
                (p.event.global[h] = !0));
          e = null;
        }
      },
      remove: function (e, t, n, i, o) {
        var r,
          s,
          a,
          l,
          c,
          u,
          d,
          f,
          h,
          m,
          g,
          v = p.hasData(e) && p._data(e);
        if (v && (u = v.events)) {
          for (c = (t = (t || "").match($) || [""]).length; c--; )
            if (
              ((h = g = (a = Y.exec(t[c]) || [])[1]),
              (m = (a[2] || "").split(".").sort()),
              h)
            ) {
              for (
                d = p.event.special[h] || {},
                  f = u[(h = (i ? d.delegateType : d.bindType) || h)] || [],
                  a =
                    a[2] &&
                    new RegExp("(^|\\.)" + m.join("\\.(?:.*\\.|)") + "(\\.|$)"),
                  l = r = f.length;
                r--;

              )
                (s = f[r]),
                  (!o && g !== s.origType) ||
                    (n && n.guid !== s.guid) ||
                    (a && !a.test(s.namespace)) ||
                    (i && i !== s.selector && ("**" !== i || !s.selector)) ||
                    (f.splice(r, 1),
                    s.selector && f.delegateCount--,
                    d.remove && d.remove.call(e, s));
              l &&
                !f.length &&
                ((d.teardown && !1 !== d.teardown.call(e, m, v.handle)) ||
                  p.removeEvent(e, h, v.handle),
                delete u[h]);
            } else for (h in u) p.event.remove(e, h + t[c], n, i, !0);
          p.isEmptyObject(u) && (delete v.handle, p._removeData(e, "events"));
        }
      },
      trigger: function (t, n, i, o) {
        var r,
          s,
          a,
          l,
          u,
          d,
          f,
          h = [i || E],
          m = c.call(t, "type") ? t.type : t,
          g = c.call(t, "namespace") ? t.namespace.split(".") : [];
        if (
          ((a = d = i = i || E),
          3 !== i.nodeType &&
            8 !== i.nodeType &&
            !K.test(m + p.event.triggered) &&
            (m.indexOf(".") >= 0 &&
              ((m = (g = m.split(".")).shift()), g.sort()),
            (s = m.indexOf(":") < 0 && "on" + m),
            ((t = t[p.expando]
              ? t
              : new p.Event(m, "object" == typeof t && t)).isTrigger = o
              ? 2
              : 3),
            (t.namespace = g.join(".")),
            (t.namespace_re = t.namespace
              ? new RegExp("(^|\\.)" + g.join("\\.(?:.*\\.|)") + "(\\.|$)")
              : null),
            (t.result = void 0),
            t.target || (t.target = i),
            (n = null == n ? [t] : p.makeArray(n, [t])),
            (u = p.event.special[m] || {}),
            o || !u.trigger || !1 !== u.trigger.apply(i, n)))
        ) {
          if (!o && !u.noBubble && !p.isWindow(i)) {
            for (
              l = u.delegateType || m, K.test(l + m) || (a = a.parentNode);
              a;
              a = a.parentNode
            )
              h.push(a), (d = a);
            d === (i.ownerDocument || E) &&
              h.push(d.defaultView || d.parentWindow || e);
          }
          for (f = 0; (a = h[f++]) && !t.isPropagationStopped(); )
            (t.type = f > 1 ? l : u.bindType || m),
              (r =
                (p._data(a, "events") || {})[t.type] && p._data(a, "handle")) &&
                r.apply(a, n),
              (r = s && a[s]) &&
                r.apply &&
                p.acceptData(a) &&
                ((t.result = r.apply(a, n)),
                !1 === t.result && t.preventDefault());
          if (
            ((t.type = m),
            !o &&
              !t.isDefaultPrevented() &&
              (!u._default || !1 === u._default.apply(h.pop(), n)) &&
              p.acceptData(i) &&
              s &&
              i[m] &&
              !p.isWindow(i))
          ) {
            (d = i[s]) && (i[s] = null), (p.event.triggered = m);
            try {
              i[m]();
            } catch (e) {}
            (p.event.triggered = void 0), d && (i[s] = d);
          }
          return t.result;
        }
      },
      dispatch: function (e) {
        e = p.event.fix(e);
        var t,
          n,
          o,
          r,
          s,
          a = [],
          l = i.call(arguments),
          c = (p._data(this, "events") || {})[e.type] || [],
          u = p.event.special[e.type] || {};
        if (
          ((l[0] = e),
          (e.delegateTarget = this),
          !u.preDispatch || !1 !== u.preDispatch.call(this, e))
        ) {
          for (
            a = p.event.handlers.call(this, e, c), t = 0;
            (r = a[t++]) && !e.isPropagationStopped();

          )
            for (
              e.currentTarget = r.elem, s = 0;
              (o = r.handlers[s++]) && !e.isImmediatePropagationStopped();

            )
              (!e.namespace_re || e.namespace_re.test(o.namespace)) &&
                ((e.handleObj = o),
                (e.data = o.data),
                void 0 !==
                  (n = (
                    (p.event.special[o.origType] || {}).handle || o.handler
                  ).apply(r.elem, l)) &&
                  !1 === (e.result = n) &&
                  (e.preventDefault(), e.stopPropagation()));
          return u.postDispatch && u.postDispatch.call(this, e), e.result;
        }
      },
      handlers: function (e, t) {
        var n,
          i,
          o,
          r,
          s = [],
          a = t.delegateCount,
          l = e.target;
        if (a && l.nodeType && (!e.button || "click" !== e.type))
          for (; l != this; l = l.parentNode || this)
            if (1 === l.nodeType && (!0 !== l.disabled || "click" !== e.type)) {
              for (o = [], r = 0; a > r; r++)
                void 0 === o[(n = (i = t[r]).selector + " ")] &&
                  (o[n] = i.needsContext
                    ? p(n, this).index(l) >= 0
                    : p.find(n, this, null, [l]).length),
                  o[n] && o.push(i);
              o.length && s.push({ elem: l, handlers: o });
            }
        return a < t.length && s.push({ elem: this, handlers: t.slice(a) }), s;
      },
      fix: function (e) {
        if (e[p.expando]) return e;
        var t,
          n,
          i,
          o = e.type,
          r = e,
          s = this.fixHooks[o];
        for (
          s ||
            (this.fixHooks[o] = s =
              G.test(o) ? this.mouseHooks : Q.test(o) ? this.keyHooks : {}),
            i = s.props ? this.props.concat(s.props) : this.props,
            e = new p.Event(r),
            t = i.length;
          t--;

        )
          e[(n = i[t])] = r[n];
        return (
          e.target || (e.target = r.srcElement || E),
          3 === e.target.nodeType && (e.target = e.target.parentNode),
          (e.metaKey = !!e.metaKey),
          s.filter ? s.filter(e, r) : e
        );
      },
      props:
        "altKey bubbles cancelable ctrlKey currentTarget eventPhase metaKey relatedTarget shiftKey target timeStamp view which".split(
          " "
        ),
      fixHooks: {},
      keyHooks: {
        props: "char charCode key keyCode".split(" "),
        filter: function (e, t) {
          return (
            null == e.which &&
              (e.which = null != t.charCode ? t.charCode : t.keyCode),
            e
          );
        },
      },
      mouseHooks: {
        props:
          "button buttons clientX clientY fromElement offsetX offsetY pageX pageY screenX screenY toElement".split(
            " "
          ),
        filter: function (e, t) {
          var n,
            i,
            o,
            r = t.button,
            s = t.fromElement;
          return (
            null == e.pageX &&
              null != t.clientX &&
              ((o = (i = e.target.ownerDocument || E).documentElement),
              (n = i.body),
              (e.pageX =
                t.clientX +
                ((o && o.scrollLeft) || (n && n.scrollLeft) || 0) -
                ((o && o.clientLeft) || (n && n.clientLeft) || 0)),
              (e.pageY =
                t.clientY +
                ((o && o.scrollTop) || (n && n.scrollTop) || 0) -
                ((o && o.clientTop) || (n && n.clientTop) || 0))),
            !e.relatedTarget &&
              s &&
              (e.relatedTarget = s === e.target ? t.toElement : s),
            e.which ||
              void 0 === r ||
              (e.which = 1 & r ? 1 : 2 & r ? 3 : 4 & r ? 2 : 0),
            e
          );
        },
      },
      special: {
        load: { noBubble: !0 },
        focus: {
          trigger: function () {
            if (this !== ee() && this.focus)
              try {
                return this.focus(), !1;
              } catch (e) {}
          },
          delegateType: "focusin",
        },
        blur: {
          trigger: function () {
            return this === ee() && this.blur ? (this.blur(), !1) : void 0;
          },
          delegateType: "focusout",
        },
        click: {
          trigger: function () {
            return p.nodeName(this, "input") &&
              "checkbox" === this.type &&
              this.click
              ? (this.click(), !1)
              : void 0;
          },
          _default: function (e) {
            return p.nodeName(e.target, "a");
          },
        },
        beforeunload: {
          postDispatch: function (e) {
            void 0 !== e.result &&
              e.originalEvent &&
              (e.originalEvent.returnValue = e.result);
          },
        },
      },
      simulate: function (e, t, n, i) {
        var o = p.extend(new p.Event(), n, {
          type: e,
          isSimulated: !0,
          originalEvent: {},
        });
        i ? p.event.trigger(o, null, t) : p.event.dispatch.call(t, o),
          o.isDefaultPrevented() && n.preventDefault();
      },
    }),
      (p.removeEvent = E.removeEventListener
        ? function (e, t, n) {
            e.removeEventListener && e.removeEventListener(t, n, !1);
          }
        : function (e, t, n) {
            var i = "on" + t;
            e.detachEvent &&
              (typeof e[i] === j && (e[i] = null), e.detachEvent(i, n));
          }),
      (p.Event = function (e, t) {
        return this instanceof p.Event
          ? (e && e.type
              ? ((this.originalEvent = e),
                (this.type = e.type),
                (this.isDefaultPrevented =
                  e.defaultPrevented ||
                  (void 0 === e.defaultPrevented && !1 === e.returnValue)
                    ? Z
                    : J))
              : (this.type = e),
            t && p.extend(this, t),
            (this.timeStamp = (e && e.timeStamp) || p.now()),
            void (this[p.expando] = !0))
          : new p.Event(e, t);
      }),
      (p.Event.prototype = {
        isDefaultPrevented: J,
        isPropagationStopped: J,
        isImmediatePropagationStopped: J,
        preventDefault: function () {
          var e = this.originalEvent;
          (this.isDefaultPrevented = Z),
            e && (e.preventDefault ? e.preventDefault() : (e.returnValue = !1));
        },
        stopPropagation: function () {
          var e = this.originalEvent;
          (this.isPropagationStopped = Z),
            e &&
              (e.stopPropagation && e.stopPropagation(), (e.cancelBubble = !0));
        },
        stopImmediatePropagation: function () {
          var e = this.originalEvent;
          (this.isImmediatePropagationStopped = Z),
            e && e.stopImmediatePropagation && e.stopImmediatePropagation(),
            this.stopPropagation();
        },
      }),
      p.each(
        {
          mouseenter: "mouseover",
          mouseleave: "mouseout",
          pointerenter: "pointerover",
          pointerleave: "pointerout",
        },
        function (e, t) {
          p.event.special[e] = {
            delegateType: t,
            bindType: t,
            handle: function (e) {
              var n,
                i = e.relatedTarget,
                o = e.handleObj;
              return (
                (!i || (i !== this && !p.contains(this, i))) &&
                  ((e.type = o.origType),
                  (n = o.handler.apply(this, arguments)),
                  (e.type = t)),
                n
              );
            },
          };
        }
      ),
      u.submitBubbles ||
        (p.event.special.submit = {
          setup: function () {
            return (
              !p.nodeName(this, "form") &&
              void p.event.add(
                this,
                "click._submit keypress._submit",
                function (e) {
                  var t = e.target,
                    n =
                      p.nodeName(t, "input") || p.nodeName(t, "button")
                        ? t.form
                        : void 0;
                  n &&
                    !p._data(n, "submitBubbles") &&
                    (p.event.add(n, "submit._submit", function (e) {
                      e._submit_bubble = !0;
                    }),
                    p._data(n, "submitBubbles", !0));
                }
              )
            );
          },
          postDispatch: function (e) {
            e._submit_bubble &&
              (delete e._submit_bubble,
              this.parentNode &&
                !e.isTrigger &&
                p.event.simulate("submit", this.parentNode, e, !0));
          },
          teardown: function () {
            return (
              !p.nodeName(this, "form") && void p.event.remove(this, "._submit")
            );
          },
        }),
      u.changeBubbles ||
        (p.event.special.change = {
          setup: function () {
            return X.test(this.nodeName)
              ? (("checkbox" === this.type || "radio" === this.type) &&
                  (p.event.add(this, "propertychange._change", function (e) {
                    "checked" === e.originalEvent.propertyName &&
                      (this._just_changed = !0);
                  }),
                  p.event.add(this, "click._change", function (e) {
                    this._just_changed &&
                      !e.isTrigger &&
                      (this._just_changed = !1),
                      p.event.simulate("change", this, e, !0);
                  })),
                !1)
              : void p.event.add(this, "beforeactivate._change", function (e) {
                  var t = e.target;
                  X.test(t.nodeName) &&
                    !p._data(t, "changeBubbles") &&
                    (p.event.add(t, "change._change", function (e) {
                      !this.parentNode ||
                        e.isSimulated ||
                        e.isTrigger ||
                        p.event.simulate("change", this.parentNode, e, !0);
                    }),
                    p._data(t, "changeBubbles", !0));
                });
          },
          handle: function (e) {
            var t = e.target;
            return this !== t ||
              e.isSimulated ||
              e.isTrigger ||
              ("radio" !== t.type && "checkbox" !== t.type)
              ? e.handleObj.handler.apply(this, arguments)
              : void 0;
          },
          teardown: function () {
            return p.event.remove(this, "._change"), !X.test(this.nodeName);
          },
        }),
      u.focusinBubbles ||
        p.each({ focus: "focusin", blur: "focusout" }, function (e, t) {
          var n = function (e) {
            p.event.simulate(t, e.target, p.event.fix(e), !0);
          };
          p.event.special[t] = {
            setup: function () {
              var i = this.ownerDocument || this,
                o = p._data(i, t);
              o || i.addEventListener(e, n, !0), p._data(i, t, (o || 0) + 1);
            },
            teardown: function () {
              var i = this.ownerDocument || this,
                o = p._data(i, t) - 1;
              o
                ? p._data(i, t, o)
                : (i.removeEventListener(e, n, !0), p._removeData(i, t));
            },
          };
        }),
      p.fn.extend({
        on: function (e, t, n, i, o) {
          var r, s;
          if ("object" == typeof e) {
            for (r in ("string" != typeof t && ((n = n || t), (t = void 0)), e))
              this.on(r, t, n, e[r], o);
            return this;
          }
          if (
            (null == n && null == i
              ? ((i = t), (n = t = void 0))
              : null == i &&
                ("string" == typeof t
                  ? ((i = n), (n = void 0))
                  : ((i = n), (n = t), (t = void 0))),
            !1 === i)
          )
            i = J;
          else if (!i) return this;
          return (
            1 === o &&
              ((s = i),
              ((i = function (e) {
                return p().off(e), s.apply(this, arguments);
              }).guid = s.guid || (s.guid = p.guid++))),
            this.each(function () {
              p.event.add(this, e, i, n, t);
            })
          );
        },
        one: function (e, t, n, i) {
          return this.on(e, t, n, i, 1);
        },
        off: function (e, t, n) {
          var i, o;
          if (e && e.preventDefault && e.handleObj)
            return (
              (i = e.handleObj),
              p(e.delegateTarget).off(
                i.namespace ? i.origType + "." + i.namespace : i.origType,
                i.selector,
                i.handler
              ),
              this
            );
          if ("object" == typeof e) {
            for (o in e) this.off(o, t, e[o]);
            return this;
          }
          return (
            (!1 === t || "function" == typeof t) && ((n = t), (t = void 0)),
            !1 === n && (n = J),
            this.each(function () {
              p.event.remove(this, e, n, t);
            })
          );
        },
        trigger: function (e, t) {
          return this.each(function () {
            p.event.trigger(e, t, this);
          });
        },
        triggerHandler: function (e, t) {
          var n = this[0];
          return n ? p.event.trigger(e, t, n, !0) : void 0;
        },
      });
    var ne =
        "abbr|article|aside|audio|bdi|canvas|data|datalist|details|figcaption|figure|footer|header|hgroup|mark|meter|nav|output|progress|section|summary|time|video",
      ie = / jQuery\d+="(?:null|\d+)"/g,
      oe = new RegExp("<(?:" + ne + ")[\\s/>]", "i"),
      re = /^\s+/,
      se =
        /<(?!area|br|col|embed|hr|img|input|link|meta|param)(([\w:]+)[^>]*)\/>/gi,
      ae = /<([\w:]+)/,
      le = /<tbody/i,
      ce = /<|&#?\w+;/,
      ue = /<(?:script|style|link)/i,
      de = /checked\s*(?:[^=]|=\s*.checked.)/i,
      pe = /^$|\/(?:java|ecma)script/i,
      fe = /^true\/(.*)/,
      he = /^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g,
      me = {
        option: [1, "<select multiple='multiple'>", "</select>"],
        legend: [1, "<fieldset>", "</fieldset>"],
        area: [1, "<map>", "</map>"],
        param: [1, "<object>", "</object>"],
        thead: [1, "<table>", "</table>"],
        tr: [2, "<table><tbody>", "</tbody></table>"],
        col: [2, "<table><tbody></tbody><colgroup>", "</colgroup></table>"],
        td: [3, "<table><tbody><tr>", "</tr></tbody></table>"],
        _default: u.htmlSerialize ? [0, "", ""] : [1, "X<div>", "</div>"],
      },
      ge = te(E).appendChild(E.createElement("div"));
    function ve(e, t) {
      var n,
        i,
        o = 0,
        r =
          typeof e.getElementsByTagName !== j
            ? e.getElementsByTagName(t || "*")
            : typeof e.querySelectorAll !== j
            ? e.querySelectorAll(t || "*")
            : void 0;
      if (!r)
        for (r = [], n = e.childNodes || e; null != (i = n[o]); o++)
          !t || p.nodeName(i, t) ? r.push(i) : p.merge(r, ve(i, t));
      return void 0 === t || (t && p.nodeName(e, t)) ? p.merge([e], r) : r;
    }
    function ye(e) {
      V.test(e.type) && (e.defaultChecked = e.checked);
    }
    function be(e, t) {
      return p.nodeName(e, "table") &&
        p.nodeName(11 !== t.nodeType ? t : t.firstChild, "tr")
        ? e.getElementsByTagName("tbody")[0] ||
            e.appendChild(e.ownerDocument.createElement("tbody"))
        : e;
    }
    function we(e) {
      return (e.type = (null !== p.find.attr(e, "type")) + "/" + e.type), e;
    }
    function xe(e) {
      var t = fe.exec(e.type);
      return t ? (e.type = t[1]) : e.removeAttribute("type"), e;
    }
    function Ce(e, t) {
      for (var n, i = 0; null != (n = e[i]); i++)
        p._data(n, "globalEval", !t || p._data(t[i], "globalEval"));
    }
    function Te(e, t) {
      if (1 === t.nodeType && p.hasData(e)) {
        var n,
          i,
          o,
          r = p._data(e),
          s = p._data(t, r),
          a = r.events;
        if (a)
          for (n in (delete s.handle, (s.events = {}), a))
            for (i = 0, o = a[n].length; o > i; i++) p.event.add(t, n, a[n][i]);
        s.data && (s.data = p.extend({}, s.data));
      }
    }
    function Ee(e, t) {
      var n, i, o;
      if (1 === t.nodeType) {
        if (((n = t.nodeName.toLowerCase()), !u.noCloneEvent && t[p.expando])) {
          for (i in (o = p._data(t)).events) p.removeEvent(t, i, o.handle);
          t.removeAttribute(p.expando);
        }
        "script" === n && t.text !== e.text
          ? ((we(t).text = e.text), xe(t))
          : "object" === n
          ? (t.parentNode && (t.outerHTML = e.outerHTML),
            u.html5Clone &&
              e.innerHTML &&
              !p.trim(t.innerHTML) &&
              (t.innerHTML = e.innerHTML))
          : "input" === n && V.test(e.type)
          ? ((t.defaultChecked = t.checked = e.checked),
            t.value !== e.value && (t.value = e.value))
          : "option" === n
          ? (t.defaultSelected = t.selected = e.defaultSelected)
          : ("input" === n || "textarea" === n) &&
            (t.defaultValue = e.defaultValue);
      }
    }
    (me.optgroup = me.option),
      (me.tbody = me.tfoot = me.colgroup = me.caption = me.thead),
      (me.th = me.td),
      p.extend({
        clone: function (e, t, n) {
          var i,
            o,
            r,
            s,
            a,
            l = p.contains(e.ownerDocument, e);
          if (
            (u.html5Clone || p.isXMLDoc(e) || !oe.test("<" + e.nodeName + ">")
              ? (r = e.cloneNode(!0))
              : ((ge.innerHTML = e.outerHTML),
                ge.removeChild((r = ge.firstChild))),
            !(
              (u.noCloneEvent && u.noCloneChecked) ||
              (1 !== e.nodeType && 11 !== e.nodeType) ||
              p.isXMLDoc(e)
            ))
          )
            for (i = ve(r), a = ve(e), s = 0; null != (o = a[s]); ++s)
              i[s] && Ee(o, i[s]);
          if (t)
            if (n)
              for (
                a = a || ve(e), i = i || ve(r), s = 0;
                null != (o = a[s]);
                s++
              )
                Te(o, i[s]);
            else Te(e, r);
          return (
            (i = ve(r, "script")).length > 0 && Ce(i, !l && ve(e, "script")),
            (i = a = o = null),
            r
          );
        },
        buildFragment: function (e, t, n, i) {
          for (
            var o, r, s, a, l, c, d, f = e.length, h = te(t), m = [], g = 0;
            f > g;
            g++
          )
            if ((r = e[g]) || 0 === r)
              if ("object" === p.type(r)) p.merge(m, r.nodeType ? [r] : r);
              else if (ce.test(r)) {
                for (
                  a = a || h.appendChild(t.createElement("div")),
                    l = (ae.exec(r) || ["", ""])[1].toLowerCase(),
                    d = me[l] || me._default,
                    a.innerHTML = d[1] + r.replace(se, "<$1></$2>") + d[2],
                    o = d[0];
                  o--;

                )
                  a = a.lastChild;
                if (
                  (!u.leadingWhitespace &&
                    re.test(r) &&
                    m.push(t.createTextNode(re.exec(r)[0])),
                  !u.tbody)
                )
                  for (
                    o =
                      (r =
                        "table" !== l || le.test(r)
                          ? "<table>" !== d[1] || le.test(r)
                            ? 0
                            : a
                          : a.firstChild) && r.childNodes.length;
                    o--;

                  )
                    p.nodeName((c = r.childNodes[o]), "tbody") &&
                      !c.childNodes.length &&
                      r.removeChild(c);
                for (
                  p.merge(m, a.childNodes), a.textContent = "";
                  a.firstChild;

                )
                  a.removeChild(a.firstChild);
                a = h.lastChild;
              } else m.push(t.createTextNode(r));
          for (
            a && h.removeChild(a),
              u.appendChecked || p.grep(ve(m, "input"), ye),
              g = 0;
            (r = m[g++]);

          )
            if (
              (!i || -1 === p.inArray(r, i)) &&
              ((s = p.contains(r.ownerDocument, r)),
              (a = ve(h.appendChild(r), "script")),
              s && Ce(a),
              n)
            )
              for (o = 0; (r = a[o++]); ) pe.test(r.type || "") && n.push(r);
          return (a = null), h;
        },
        cleanData: function (e, t) {
          for (
            var i,
              o,
              r,
              s,
              a = 0,
              l = p.expando,
              c = p.cache,
              d = u.deleteExpando,
              f = p.event.special;
            null != (i = e[a]);
            a++
          )
            if ((t || p.acceptData(i)) && (s = (r = i[l]) && c[r])) {
              if (s.events)
                for (o in s.events)
                  f[o] ? p.event.remove(i, o) : p.removeEvent(i, o, s.handle);
              c[r] &&
                (delete c[r],
                d
                  ? delete i[l]
                  : typeof i.removeAttribute !== j
                  ? i.removeAttribute(l)
                  : (i[l] = null),
                n.push(r));
            }
        },
      }),
      p.fn.extend({
        text: function (e) {
          return U(
            this,
            function (e) {
              return void 0 === e
                ? p.text(this)
                : this.empty().append(
                    ((this[0] && this[0].ownerDocument) || E).createTextNode(e)
                  );
            },
            null,
            e,
            arguments.length
          );
        },
        append: function () {
          return this.domManip(arguments, function (e) {
            (1 !== this.nodeType &&
              11 !== this.nodeType &&
              9 !== this.nodeType) ||
              be(this, e).appendChild(e);
          });
        },
        prepend: function () {
          return this.domManip(arguments, function (e) {
            if (
              1 === this.nodeType ||
              11 === this.nodeType ||
              9 === this.nodeType
            ) {
              var t = be(this, e);
              t.insertBefore(e, t.firstChild);
            }
          });
        },
        before: function () {
          return this.domManip(arguments, function (e) {
            this.parentNode && this.parentNode.insertBefore(e, this);
          });
        },
        after: function () {
          return this.domManip(arguments, function (e) {
            this.parentNode &&
              this.parentNode.insertBefore(e, this.nextSibling);
          });
        },
        remove: function (e, t) {
          for (
            var n, i = e ? p.filter(e, this) : this, o = 0;
            null != (n = i[o]);
            o++
          )
            t || 1 !== n.nodeType || p.cleanData(ve(n)),
              n.parentNode &&
                (t && p.contains(n.ownerDocument, n) && Ce(ve(n, "script")),
                n.parentNode.removeChild(n));
          return this;
        },
        empty: function () {
          for (var e, t = 0; null != (e = this[t]); t++) {
            for (1 === e.nodeType && p.cleanData(ve(e, !1)); e.firstChild; )
              e.removeChild(e.firstChild);
            e.options && p.nodeName(e, "select") && (e.options.length = 0);
          }
          return this;
        },
        clone: function (e, t) {
          return (
            (e = null != e && e),
            (t = null == t ? e : t),
            this.map(function () {
              return p.clone(this, e, t);
            })
          );
        },
        html: function (e) {
          return U(
            this,
            function (e) {
              var t = this[0] || {},
                n = 0,
                i = this.length;
              if (void 0 === e)
                return 1 === t.nodeType ? t.innerHTML.replace(ie, "") : void 0;
              if (
                !(
                  "string" != typeof e ||
                  ue.test(e) ||
                  (!u.htmlSerialize && oe.test(e)) ||
                  (!u.leadingWhitespace && re.test(e)) ||
                  me[(ae.exec(e) || ["", ""])[1].toLowerCase()]
                )
              ) {
                e = e.replace(se, "<$1></$2>");
                try {
                  for (; i > n; n++)
                    1 === (t = this[n] || {}).nodeType &&
                      (p.cleanData(ve(t, !1)), (t.innerHTML = e));
                  t = 0;
                } catch (e) {}
              }
              t && this.empty().append(e);
            },
            null,
            e,
            arguments.length
          );
        },
        replaceWith: function () {
          var e = arguments[0];
          return (
            this.domManip(arguments, function (t) {
              (e = this.parentNode),
                p.cleanData(ve(this)),
                e && e.replaceChild(t, this);
            }),
            e && (e.length || e.nodeType) ? this : this.remove()
          );
        },
        detach: function (e) {
          return this.remove(e, !0);
        },
        domManip: function (e, t) {
          e = o.apply([], e);
          var n,
            i,
            r,
            s,
            a,
            l,
            c = 0,
            d = this.length,
            f = this,
            h = d - 1,
            m = e[0],
            g = p.isFunction(m);
          if (
            g ||
            (d > 1 && "string" == typeof m && !u.checkClone && de.test(m))
          )
            return this.each(function (n) {
              var i = f.eq(n);
              g && (e[0] = m.call(this, n, i.html())), i.domManip(e, t);
            });
          if (
            d &&
            ((n = (l = p.buildFragment(e, this[0].ownerDocument, !1, this))
              .firstChild),
            1 === l.childNodes.length && (l = n),
            n)
          ) {
            for (r = (s = p.map(ve(l, "script"), we)).length; d > c; c++)
              (i = l),
                c !== h &&
                  ((i = p.clone(i, !0, !0)), r && p.merge(s, ve(i, "script"))),
                t.call(this[c], i, c);
            if (r)
              for (
                a = s[s.length - 1].ownerDocument, p.map(s, xe), c = 0;
                r > c;
                c++
              )
                (i = s[c]),
                  pe.test(i.type || "") &&
                    !p._data(i, "globalEval") &&
                    p.contains(a, i) &&
                    (i.src
                      ? p._evalUrl && p._evalUrl(i.src)
                      : p.globalEval(
                          (
                            i.text ||
                            i.textContent ||
                            i.innerHTML ||
                            ""
                          ).replace(he, "")
                        ));
            l = n = null;
          }
          return this;
        },
      }),
      p.each(
        {
          appendTo: "append",
          prependTo: "prepend",
          insertBefore: "before",
          insertAfter: "after",
          replaceAll: "replaceWith",
        },
        function (e, t) {
          p.fn[e] = function (e) {
            for (var n, i = 0, o = [], s = p(e), a = s.length - 1; a >= i; i++)
              (n = i === a ? this : this.clone(!0)),
                p(s[i])[t](n),
                r.apply(o, n.get());
            return this.pushStack(o);
          };
        }
      );
    var ke,
      _e,
      Se = {};
    function Ne(t, n) {
      var i,
        o = p(n.createElement(t)).appendTo(n.body),
        r =
          e.getDefaultComputedStyle && (i = e.getDefaultComputedStyle(o[0]))
            ? i.display
            : p.css(o[0], "display");
      return o.detach(), r;
    }
    function Ae(e) {
      var t = E,
        n = Se[e];
      return (
        n ||
          (("none" !== (n = Ne(e, t)) && n) ||
            ((t = (
              (ke = (
                ke || p("<iframe frameborder='0' width='0' height='0'/>")
              ).appendTo(t.documentElement))[0].contentWindow ||
              ke[0].contentDocument
            ).document).write(),
            t.close(),
            (n = Ne(e, t)),
            ke.detach()),
          (Se[e] = n)),
        n
      );
    }
    u.shrinkWrapBlocks = function () {
      return null != _e
        ? _e
        : ((_e = !1),
          (t = E.getElementsByTagName("body")[0]) && t.style
            ? ((e = E.createElement("div")),
              ((n = E.createElement("div")).style.cssText =
                "position:absolute;border:0;width:0;height:0;top:0;left:-9999px"),
              t.appendChild(n).appendChild(e),
              typeof e.style.zoom !== j &&
                ((e.style.cssText =
                  "-webkit-box-sizing:content-box;-moz-box-sizing:content-box;box-sizing:content-box;display:block;margin:0;border:0;padding:1px;width:1px;zoom:1"),
                (e.appendChild(E.createElement("div")).style.width = "5px"),
                (_e = 3 !== e.offsetWidth)),
              t.removeChild(n),
              _e)
            : void 0);
      var e, t, n;
    };
    var $e,
      Ie,
      De = /^margin/,
      Oe = new RegExp("^(" + F + ")(?!px)[a-z%]+$", "i"),
      Le = /^(top|right|bottom|left)$/;
    function je(e, t) {
      return {
        get: function () {
          var n = e();
          if (null != n)
            return n
              ? void delete this.get
              : (this.get = t).apply(this, arguments);
        },
      };
    }
    e.getComputedStyle
      ? (($e = function (t) {
          return t.ownerDocument.defaultView.opener
            ? t.ownerDocument.defaultView.getComputedStyle(t, null)
            : e.getComputedStyle(t, null);
        }),
        (Ie = function (e, t, n) {
          var i,
            o,
            r,
            s,
            a = e.style;
          return (
            (s = (n = n || $e(e)) ? n.getPropertyValue(t) || n[t] : void 0),
            n &&
              ("" !== s ||
                p.contains(e.ownerDocument, e) ||
                (s = p.style(e, t)),
              Oe.test(s) &&
                De.test(t) &&
                ((i = a.width),
                (o = a.minWidth),
                (r = a.maxWidth),
                (a.minWidth = a.maxWidth = a.width = s),
                (s = n.width),
                (a.width = i),
                (a.minWidth = o),
                (a.maxWidth = r))),
            void 0 === s ? s : s + ""
          );
        }))
      : E.documentElement.currentStyle &&
        (($e = function (e) {
          return e.currentStyle;
        }),
        (Ie = function (e, t, n) {
          var i,
            o,
            r,
            s,
            a = e.style;
          return (
            null == (s = (n = n || $e(e)) ? n[t] : void 0) &&
              a &&
              a[t] &&
              (s = a[t]),
            Oe.test(s) &&
              !Le.test(t) &&
              ((i = a.left),
              (r = (o = e.runtimeStyle) && o.left) &&
                (o.left = e.currentStyle.left),
              (a.left = "fontSize" === t ? "1em" : s),
              (s = a.pixelLeft + "px"),
              (a.left = i),
              r && (o.left = r)),
            void 0 === s ? s : s + "" || "auto"
          );
        })),
      (function () {
        var t, n, i, o, r, s, a;
        if (
          (((t = E.createElement("div")).innerHTML =
            "  <link/><table></table><a href='/a'>a</a><input type='checkbox'/>"),
          (n = (i = t.getElementsByTagName("a")[0]) && i.style))
        ) {
          function l() {
            var t, n, i, l;
            (n = E.getElementsByTagName("body")[0]) &&
              n.style &&
              ((t = E.createElement("div")),
              ((i = E.createElement("div")).style.cssText =
                "position:absolute;border:0;width:0;height:0;top:0;left:-9999px"),
              n.appendChild(i).appendChild(t),
              (t.style.cssText =
                "-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;display:block;margin-top:1%;top:1%;border:1px;padding:1px;width:4px;position:absolute"),
              (o = r = !1),
              (a = !0),
              e.getComputedStyle &&
                ((o = "1%" !== (e.getComputedStyle(t, null) || {}).top),
                (r =
                  "4px" ===
                  (e.getComputedStyle(t, null) || { width: "4px" }).width),
                ((l = t.appendChild(E.createElement("div"))).style.cssText =
                  t.style.cssText =
                    "-webkit-box-sizing:content-box;-moz-box-sizing:content-box;box-sizing:content-box;display:block;margin:0;border:0;padding:0"),
                (l.style.marginRight = l.style.width = "0"),
                (t.style.width = "1px"),
                (a = !parseFloat(
                  (e.getComputedStyle(l, null) || {}).marginRight
                )),
                t.removeChild(l)),
              (t.innerHTML = "<table><tr><td></td><td>t</td></tr></table>"),
              ((l = t.getElementsByTagName("td"))[0].style.cssText =
                "margin:0;border:0;padding:0;display:none"),
              (s = 0 === l[0].offsetHeight) &&
                ((l[0].style.display = ""),
                (l[1].style.display = "none"),
                (s = 0 === l[0].offsetHeight)),
              n.removeChild(i));
          }
          (n.cssText = "float:left;opacity:.5"),
            (u.opacity = "0.5" === n.opacity),
            (u.cssFloat = !!n.cssFloat),
            (t.style.backgroundClip = "content-box"),
            (t.cloneNode(!0).style.backgroundClip = ""),
            (u.clearCloneStyle = "content-box" === t.style.backgroundClip),
            (u.boxSizing =
              "" === n.boxSizing ||
              "" === n.MozBoxSizing ||
              "" === n.WebkitBoxSizing),
            p.extend(u, {
              reliableHiddenOffsets: function () {
                return null == s && l(), s;
              },
              boxSizingReliable: function () {
                return null == r && l(), r;
              },
              pixelPosition: function () {
                return null == o && l(), o;
              },
              reliableMarginRight: function () {
                return null == a && l(), a;
              },
            });
        }
      })(),
      (p.swap = function (e, t, n, i) {
        var o,
          r,
          s = {};
        for (r in t) (s[r] = e.style[r]), (e.style[r] = t[r]);
        for (r in ((o = n.apply(e, i || [])), t)) e.style[r] = s[r];
        return o;
      });
    var Pe = /alpha\([^)]*\)/i,
      Me = /opacity\s*=\s*([^)]*)/,
      ze = /^(none|table(?!-c[ea]).+)/,
      He = new RegExp("^(" + F + ")(.*)$", "i"),
      Re = new RegExp("^([+-])=(" + F + ")", "i"),
      We = { position: "absolute", visibility: "hidden", display: "block" },
      Fe = { letterSpacing: "0", fontWeight: "400" },
      Be = ["Webkit", "O", "Moz", "ms"];
    function qe(e, t) {
      if (t in e) return t;
      for (
        var n = t.charAt(0).toUpperCase() + t.slice(1), i = t, o = Be.length;
        o--;

      )
        if ((t = Be[o] + n) in e) return t;
      return i;
    }
    function Ue(e, t) {
      for (var n, i, o, r = [], s = 0, a = e.length; a > s; s++)
        (i = e[s]).style &&
          ((r[s] = p._data(i, "olddisplay")),
          (n = i.style.display),
          t
            ? (r[s] || "none" !== n || (i.style.display = ""),
              "" === i.style.display &&
                q(i) &&
                (r[s] = p._data(i, "olddisplay", Ae(i.nodeName))))
            : ((o = q(i)),
              ((n && "none" !== n) || !o) &&
                p._data(i, "olddisplay", o ? n : p.css(i, "display"))));
      for (s = 0; a > s; s++)
        (i = e[s]).style &&
          ((t && "none" !== i.style.display && "" !== i.style.display) ||
            (i.style.display = t ? r[s] || "" : "none"));
      return e;
    }
    function Ve(e, t, n) {
      var i = He.exec(t);
      return i ? Math.max(0, i[1] - (n || 0)) + (i[2] || "px") : t;
    }
    function Xe(e, t, n, i, o) {
      for (
        var r = n === (i ? "border" : "content") ? 4 : "width" === t ? 1 : 0,
          s = 0;
        4 > r;
        r += 2
      )
        "margin" === n && (s += p.css(e, n + B[r], !0, o)),
          i
            ? ("content" === n && (s -= p.css(e, "padding" + B[r], !0, o)),
              "margin" !== n &&
                (s -= p.css(e, "border" + B[r] + "Width", !0, o)))
            : ((s += p.css(e, "padding" + B[r], !0, o)),
              "padding" !== n &&
                (s += p.css(e, "border" + B[r] + "Width", !0, o)));
      return s;
    }
    function Qe(e, t, n) {
      var i = !0,
        o = "width" === t ? e.offsetWidth : e.offsetHeight,
        r = $e(e),
        s = u.boxSizing && "border-box" === p.css(e, "boxSizing", !1, r);
      if (0 >= o || null == o) {
        if (
          ((0 > (o = Ie(e, t, r)) || null == o) && (o = e.style[t]), Oe.test(o))
        )
          return o;
        (i = s && (u.boxSizingReliable() || o === e.style[t])),
          (o = parseFloat(o) || 0);
      }
      return o + Xe(e, t, n || (s ? "border" : "content"), i, r) + "px";
    }
    function Ge(e, t, n, i, o) {
      return new Ge.prototype.init(e, t, n, i, o);
    }
    p.extend({
      cssHooks: {
        opacity: {
          get: function (e, t) {
            if (t) {
              var n = Ie(e, "opacity");
              return "" === n ? "1" : n;
            }
          },
        },
      },
      cssNumber: {
        columnCount: !0,
        fillOpacity: !0,
        flexGrow: !0,
        flexShrink: !0,
        fontWeight: !0,
        lineHeight: !0,
        opacity: !0,
        order: !0,
        orphans: !0,
        widows: !0,
        zIndex: !0,
        zoom: !0,
      },
      cssProps: { float: u.cssFloat ? "cssFloat" : "styleFloat" },
      style: function (e, t, n, i) {
        if (e && 3 !== e.nodeType && 8 !== e.nodeType && e.style) {
          var o,
            r,
            s,
            a = p.camelCase(t),
            l = e.style;
          if (
            ((t = p.cssProps[a] || (p.cssProps[a] = qe(l, a))),
            (s = p.cssHooks[t] || p.cssHooks[a]),
            void 0 === n)
          )
            return s && "get" in s && void 0 !== (o = s.get(e, !1, i))
              ? o
              : l[t];
          if (
            ("string" == (r = typeof n) &&
              (o = Re.exec(n)) &&
              ((n = (o[1] + 1) * o[2] + parseFloat(p.css(e, t))),
              (r = "number")),
            null != n &&
              n == n &&
              ("number" !== r || p.cssNumber[a] || (n += "px"),
              u.clearCloneStyle ||
                "" !== n ||
                0 !== t.indexOf("background") ||
                (l[t] = "inherit"),
              !s || !("set" in s) || void 0 !== (n = s.set(e, n, i))))
          )
            try {
              l[t] = n;
            } catch (e) {}
        }
      },
      css: function (e, t, n, i) {
        var o,
          r,
          s,
          a = p.camelCase(t);
        return (
          (t = p.cssProps[a] || (p.cssProps[a] = qe(e.style, a))),
          (s = p.cssHooks[t] || p.cssHooks[a]) &&
            "get" in s &&
            (r = s.get(e, !0, n)),
          void 0 === r && (r = Ie(e, t, i)),
          "normal" === r && t in Fe && (r = Fe[t]),
          "" === n || n
            ? ((o = parseFloat(r)), !0 === n || p.isNumeric(o) ? o || 0 : r)
            : r
        );
      },
    }),
      p.each(["height", "width"], function (e, t) {
        p.cssHooks[t] = {
          get: function (e, n, i) {
            return n
              ? ze.test(p.css(e, "display")) && 0 === e.offsetWidth
                ? p.swap(e, We, function () {
                    return Qe(e, t, i);
                  })
                : Qe(e, t, i)
              : void 0;
          },
          set: function (e, n, i) {
            var o = i && $e(e);
            return Ve(
              0,
              n,
              i
                ? Xe(
                    e,
                    t,
                    i,
                    u.boxSizing &&
                      "border-box" === p.css(e, "boxSizing", !1, o),
                    o
                  )
                : 0
            );
          },
        };
      }),
      u.opacity ||
        (p.cssHooks.opacity = {
          get: function (e, t) {
            return Me.test(
              (t && e.currentStyle ? e.currentStyle.filter : e.style.filter) ||
                ""
            )
              ? 0.01 * parseFloat(RegExp.$1) + ""
              : t
              ? "1"
              : "";
          },
          set: function (e, t) {
            var n = e.style,
              i = e.currentStyle,
              o = p.isNumeric(t) ? "alpha(opacity=" + 100 * t + ")" : "",
              r = (i && i.filter) || n.filter || "";
            (n.zoom = 1),
              ((t >= 1 || "" === t) &&
                "" === p.trim(r.replace(Pe, "")) &&
                n.removeAttribute &&
                (n.removeAttribute("filter"), "" === t || (i && !i.filter))) ||
                (n.filter = Pe.test(r) ? r.replace(Pe, o) : r + " " + o);
          },
        }),
      (p.cssHooks.marginRight = je(u.reliableMarginRight, function (e, t) {
        return t
          ? p.swap(e, { display: "inline-block" }, Ie, [e, "marginRight"])
          : void 0;
      })),
      p.each({ margin: "", padding: "", border: "Width" }, function (e, t) {
        (p.cssHooks[e + t] = {
          expand: function (n) {
            for (
              var i = 0, o = {}, r = "string" == typeof n ? n.split(" ") : [n];
              4 > i;
              i++
            )
              o[e + B[i] + t] = r[i] || r[i - 2] || r[0];
            return o;
          },
        }),
          De.test(e) || (p.cssHooks[e + t].set = Ve);
      }),
      p.fn.extend({
        css: function (e, t) {
          return U(
            this,
            function (e, t, n) {
              var i,
                o,
                r = {},
                s = 0;
              if (p.isArray(t)) {
                for (i = $e(e), o = t.length; o > s; s++)
                  r[t[s]] = p.css(e, t[s], !1, i);
                return r;
              }
              return void 0 !== n ? p.style(e, t, n) : p.css(e, t);
            },
            e,
            t,
            arguments.length > 1
          );
        },
        show: function () {
          return Ue(this, !0);
        },
        hide: function () {
          return Ue(this);
        },
        toggle: function (e) {
          return "boolean" == typeof e
            ? e
              ? this.show()
              : this.hide()
            : this.each(function () {
                q(this) ? p(this).show() : p(this).hide();
              });
        },
      }),
      (p.Tween = Ge),
      (Ge.prototype = {
        constructor: Ge,
        init: function (e, t, n, i, o, r) {
          (this.elem = e),
            (this.prop = n),
            (this.easing = o || "swing"),
            (this.options = t),
            (this.start = this.now = this.cur()),
            (this.end = i),
            (this.unit = r || (p.cssNumber[n] ? "" : "px"));
        },
        cur: function () {
          var e = Ge.propHooks[this.prop];
          return e && e.get ? e.get(this) : Ge.propHooks._default.get(this);
        },
        run: function (e) {
          var t,
            n = Ge.propHooks[this.prop];
          return (
            this.options.duration
              ? (this.pos = t =
                  p.easing[this.easing](
                    e,
                    this.options.duration * e,
                    0,
                    1,
                    this.options.duration
                  ))
              : (this.pos = t = e),
            (this.now = (this.end - this.start) * t + this.start),
            this.options.step &&
              this.options.step.call(this.elem, this.now, this),
            n && n.set ? n.set(this) : Ge.propHooks._default.set(this),
            this
          );
        },
      }),
      (Ge.prototype.init.prototype = Ge.prototype),
      (Ge.propHooks = {
        _default: {
          get: function (e) {
            var t;
            return null == e.elem[e.prop] ||
              (e.elem.style && null != e.elem.style[e.prop])
              ? (t = p.css(e.elem, e.prop, "")) && "auto" !== t
                ? t
                : 0
              : e.elem[e.prop];
          },
          set: function (e) {
            p.fx.step[e.prop]
              ? p.fx.step[e.prop](e)
              : e.elem.style &&
                (null != e.elem.style[p.cssProps[e.prop]] || p.cssHooks[e.prop])
              ? p.style(e.elem, e.prop, e.now + e.unit)
              : (e.elem[e.prop] = e.now);
          },
        },
      }),
      (Ge.propHooks.scrollTop = Ge.propHooks.scrollLeft =
        {
          set: function (e) {
            e.elem.nodeType && e.elem.parentNode && (e.elem[e.prop] = e.now);
          },
        }),
      (p.easing = {
        linear: function (e) {
          return e;
        },
        swing: function (e) {
          return 0.5 - Math.cos(e * Math.PI) / 2;
        },
      }),
      (p.fx = Ge.prototype.init),
      (p.fx.step = {});
    var Ke,
      Ye,
      Ze,
      Je,
      et,
      tt,
      nt,
      it = /^(?:toggle|show|hide)$/,
      ot = new RegExp("^(?:([+-])=|)(" + F + ")([a-z%]*)$", "i"),
      rt = /queueHooks$/,
      st = [
        function (e, t, n) {
          var i,
            o,
            r,
            s,
            a,
            l,
            c,
            d = this,
            f = {},
            h = e.style,
            m = e.nodeType && q(e),
            g = p._data(e, "fxshow");
          for (i in (n.queue ||
            (null == (a = p._queueHooks(e, "fx")).unqueued &&
              ((a.unqueued = 0),
              (l = a.empty.fire),
              (a.empty.fire = function () {
                a.unqueued || l();
              })),
            a.unqueued++,
            d.always(function () {
              d.always(function () {
                a.unqueued--, p.queue(e, "fx").length || a.empty.fire();
              });
            })),
          1 === e.nodeType &&
            ("height" in t || "width" in t) &&
            ((n.overflow = [h.overflow, h.overflowX, h.overflowY]),
            "inline" ===
              ("none" === (c = p.css(e, "display"))
                ? p._data(e, "olddisplay") || Ae(e.nodeName)
                : c) &&
              "none" === p.css(e, "float") &&
              (u.inlineBlockNeedsLayout && "inline" !== Ae(e.nodeName)
                ? (h.zoom = 1)
                : (h.display = "inline-block"))),
          n.overflow &&
            ((h.overflow = "hidden"),
            u.shrinkWrapBlocks() ||
              d.always(function () {
                (h.overflow = n.overflow[0]),
                  (h.overflowX = n.overflow[1]),
                  (h.overflowY = n.overflow[2]);
              })),
          t))
            if (((o = t[i]), it.exec(o))) {
              if (
                (delete t[i],
                (r = r || "toggle" === o),
                o === (m ? "hide" : "show"))
              ) {
                if ("show" !== o || !g || void 0 === g[i]) continue;
                m = !0;
              }
              f[i] = (g && g[i]) || p.style(e, i);
            } else c = void 0;
          if (p.isEmptyObject(f))
            "inline" === ("none" === c ? Ae(e.nodeName) : c) && (h.display = c);
          else
            for (i in (g
              ? "hidden" in g && (m = g.hidden)
              : (g = p._data(e, "fxshow", {})),
            r && (g.hidden = !m),
            m
              ? p(e).show()
              : d.done(function () {
                  p(e).hide();
                }),
            d.done(function () {
              var t;
              for (t in (p._removeData(e, "fxshow"), f)) p.style(e, t, f[t]);
            }),
            f))
              (s = ut(m ? g[i] : 0, i, d)),
                i in g ||
                  ((g[i] = s.start),
                  m &&
                    ((s.end = s.start),
                    (s.start = "width" === i || "height" === i ? 1 : 0)));
        },
      ],
      at = {
        "*": [
          function (e, t) {
            var n = this.createTween(e, t),
              i = n.cur(),
              o = ot.exec(t),
              r = (o && o[3]) || (p.cssNumber[e] ? "" : "px"),
              s =
                (p.cssNumber[e] || ("px" !== r && +i)) &&
                ot.exec(p.css(n.elem, e)),
              a = 1,
              l = 20;
            if (s && s[3] !== r) {
              (r = r || s[3]), (o = o || []), (s = +i || 1);
              do {
                (s /= a = a || ".5"), p.style(n.elem, e, s + r);
              } while (a !== (a = n.cur() / i) && 1 !== a && --l);
            }
            return (
              o &&
                ((s = n.start = +s || +i || 0),
                (n.unit = r),
                (n.end = o[1] ? s + (o[1] + 1) * o[2] : +o[2])),
              n
            );
          },
        ],
      };
    function lt() {
      return (
        setTimeout(function () {
          Ke = void 0;
        }),
        (Ke = p.now())
      );
    }
    function ct(e, t) {
      var n,
        i = { height: e },
        o = 0;
      for (t = t ? 1 : 0; 4 > o; o += 2 - t)
        i["margin" + (n = B[o])] = i["padding" + n] = e;
      return t && (i.opacity = i.width = e), i;
    }
    function ut(e, t, n) {
      for (
        var i, o = (at[t] || []).concat(at["*"]), r = 0, s = o.length;
        s > r;
        r++
      )
        if ((i = o[r].call(n, t, e))) return i;
    }
    function dt(e, t, n) {
      var i,
        o,
        r = 0,
        s = st.length,
        a = p.Deferred().always(function () {
          delete l.elem;
        }),
        l = function () {
          if (o) return !1;
          for (
            var t = Ke || lt(),
              n = Math.max(0, c.startTime + c.duration - t),
              i = 1 - (n / c.duration || 0),
              r = 0,
              s = c.tweens.length;
            s > r;
            r++
          )
            c.tweens[r].run(i);
          return (
            a.notifyWith(e, [c, i, n]),
            1 > i && s ? n : (a.resolveWith(e, [c]), !1)
          );
        },
        c = a.promise({
          elem: e,
          props: p.extend({}, t),
          opts: p.extend(!0, { specialEasing: {} }, n),
          originalProperties: t,
          originalOptions: n,
          startTime: Ke || lt(),
          duration: n.duration,
          tweens: [],
          createTween: function (t, n) {
            var i = p.Tween(
              e,
              c.opts,
              t,
              n,
              c.opts.specialEasing[t] || c.opts.easing
            );
            return c.tweens.push(i), i;
          },
          stop: function (t) {
            var n = 0,
              i = t ? c.tweens.length : 0;
            if (o) return this;
            for (o = !0; i > n; n++) c.tweens[n].run(1);
            return t ? a.resolveWith(e, [c, t]) : a.rejectWith(e, [c, t]), this;
          },
        }),
        u = c.props;
      for (
        (function (e, t) {
          var n, i, o, r, s;
          for (n in e)
            if (
              ((o = t[(i = p.camelCase(n))]),
              (r = e[n]),
              p.isArray(r) && ((o = r[1]), (r = e[n] = r[0])),
              n !== i && ((e[i] = r), delete e[n]),
              (s = p.cssHooks[i]) && ("expand" in s))
            )
              for (n in ((r = s.expand(r)), delete e[i], r))
                (n in e) || ((e[n] = r[n]), (t[n] = o));
            else t[i] = o;
        })(u, c.opts.specialEasing);
        s > r;
        r++
      )
        if ((i = st[r].call(c, e, u, c.opts))) return i;
      return (
        p.map(u, ut, c),
        p.isFunction(c.opts.start) && c.opts.start.call(e, c),
        p.fx.timer(p.extend(l, { elem: e, anim: c, queue: c.opts.queue })),
        c
          .progress(c.opts.progress)
          .done(c.opts.done, c.opts.complete)
          .fail(c.opts.fail)
          .always(c.opts.always)
      );
    }
    (p.Animation = p.extend(dt, {
      tweener: function (e, t) {
        p.isFunction(e) ? ((t = e), (e = ["*"])) : (e = e.split(" "));
        for (var n, i = 0, o = e.length; o > i; i++)
          (n = e[i]), (at[n] = at[n] || []), at[n].unshift(t);
      },
      prefilter: function (e, t) {
        t ? st.unshift(e) : st.push(e);
      },
    })),
      (p.speed = function (e, t, n) {
        var i =
          e && "object" == typeof e
            ? p.extend({}, e)
            : {
                complete: n || (!n && t) || (p.isFunction(e) && e),
                duration: e,
                easing: (n && t) || (t && !p.isFunction(t) && t),
              };
        return (
          (i.duration = p.fx.off
            ? 0
            : "number" == typeof i.duration
            ? i.duration
            : i.duration in p.fx.speeds
            ? p.fx.speeds[i.duration]
            : p.fx.speeds._default),
          (null == i.queue || !0 === i.queue) && (i.queue = "fx"),
          (i.old = i.complete),
          (i.complete = function () {
            p.isFunction(i.old) && i.old.call(this),
              i.queue && p.dequeue(this, i.queue);
          }),
          i
        );
      }),
      p.fn.extend({
        fadeTo: function (e, t, n, i) {
          return this.filter(q)
            .css("opacity", 0)
            .show()
            .end()
            .animate({ opacity: t }, e, n, i);
        },
        animate: function (e, t, n, i) {
          var o = p.isEmptyObject(e),
            r = p.speed(t, n, i),
            s = function () {
              var t = dt(this, p.extend({}, e), r);
              (o || p._data(this, "finish")) && t.stop(!0);
            };
          return (
            (s.finish = s),
            o || !1 === r.queue ? this.each(s) : this.queue(r.queue, s)
          );
        },
        stop: function (e, t, n) {
          var i = function (e) {
            var t = e.stop;
            delete e.stop, t(n);
          };
          return (
            "string" != typeof e && ((n = t), (t = e), (e = void 0)),
            t && !1 !== e && this.queue(e || "fx", []),
            this.each(function () {
              var t = !0,
                o = null != e && e + "queueHooks",
                r = p.timers,
                s = p._data(this);
              if (o) s[o] && s[o].stop && i(s[o]);
              else for (o in s) s[o] && s[o].stop && rt.test(o) && i(s[o]);
              for (o = r.length; o--; )
                r[o].elem !== this ||
                  (null != e && r[o].queue !== e) ||
                  (r[o].anim.stop(n), (t = !1), r.splice(o, 1));
              (t || !n) && p.dequeue(this, e);
            })
          );
        },
        finish: function (e) {
          return (
            !1 !== e && (e = e || "fx"),
            this.each(function () {
              var t,
                n = p._data(this),
                i = n[e + "queue"],
                o = n[e + "queueHooks"],
                r = p.timers,
                s = i ? i.length : 0;
              for (
                n.finish = !0,
                  p.queue(this, e, []),
                  o && o.stop && o.stop.call(this, !0),
                  t = r.length;
                t--;

              )
                r[t].elem === this &&
                  r[t].queue === e &&
                  (r[t].anim.stop(!0), r.splice(t, 1));
              for (t = 0; s > t; t++)
                i[t] && i[t].finish && i[t].finish.call(this);
              delete n.finish;
            })
          );
        },
      }),
      p.each(["toggle", "show", "hide"], function (e, t) {
        var n = p.fn[t];
        p.fn[t] = function (e, i, o) {
          return null == e || "boolean" == typeof e
            ? n.apply(this, arguments)
            : this.animate(ct(t, !0), e, i, o);
        };
      }),
      p.each(
        {
          slideDown: ct("show"),
          slideUp: ct("hide"),
          slideToggle: ct("toggle"),
          fadeIn: { opacity: "show" },
          fadeOut: { opacity: "hide" },
          fadeToggle: { opacity: "toggle" },
        },
        function (e, t) {
          p.fn[e] = function (e, n, i) {
            return this.animate(t, e, n, i);
          };
        }
      ),
      (p.timers = []),
      (p.fx.tick = function () {
        var e,
          t = p.timers,
          n = 0;
        for (Ke = p.now(); n < t.length; n++)
          (e = t[n])() || t[n] !== e || t.splice(n--, 1);
        t.length || p.fx.stop(), (Ke = void 0);
      }),
      (p.fx.timer = function (e) {
        p.timers.push(e), e() ? p.fx.start() : p.timers.pop();
      }),
      (p.fx.interval = 13),
      (p.fx.start = function () {
        Ye || (Ye = setInterval(p.fx.tick, p.fx.interval));
      }),
      (p.fx.stop = function () {
        clearInterval(Ye), (Ye = null);
      }),
      (p.fx.speeds = { slow: 600, fast: 200, _default: 400 }),
      (p.fn.delay = function (e, t) {
        return (
          (e = (p.fx && p.fx.speeds[e]) || e),
          (t = t || "fx"),
          this.queue(t, function (t, n) {
            var i = setTimeout(t, e);
            n.stop = function () {
              clearTimeout(i);
            };
          })
        );
      }),
      (Je = E.createElement("div")).setAttribute("className", "t"),
      (Je.innerHTML =
        "  <link/><table></table><a href='/a'>a</a><input type='checkbox'/>"),
      (tt = Je.getElementsByTagName("a")[0]),
      (nt = (et = E.createElement("select")).appendChild(
        E.createElement("option")
      )),
      (Ze = Je.getElementsByTagName("input")[0]),
      (tt.style.cssText = "top:1px"),
      (u.getSetAttribute = "t" !== Je.className),
      (u.style = /top/.test(tt.getAttribute("style"))),
      (u.hrefNormalized = "/a" === tt.getAttribute("href")),
      (u.checkOn = !!Ze.value),
      (u.optSelected = nt.selected),
      (u.enctype = !!E.createElement("form").enctype),
      (et.disabled = !0),
      (u.optDisabled = !nt.disabled),
      (Ze = E.createElement("input")).setAttribute("value", ""),
      (u.input = "" === Ze.getAttribute("value")),
      (Ze.value = "t"),
      Ze.setAttribute("type", "radio"),
      (u.radioValue = "t" === Ze.value);
    var pt = /\r/g;
    p.fn.extend({
      val: function (e) {
        var t,
          n,
          i,
          o = this[0];
        return arguments.length
          ? ((i = p.isFunction(e)),
            this.each(function (n) {
              var o;
              1 === this.nodeType &&
                (null == (o = i ? e.call(this, n, p(this).val()) : e)
                  ? (o = "")
                  : "number" == typeof o
                  ? (o += "")
                  : p.isArray(o) &&
                    (o = p.map(o, function (e) {
                      return null == e ? "" : e + "";
                    })),
                ((t =
                  p.valHooks[this.type] ||
                  p.valHooks[this.nodeName.toLowerCase()]) &&
                  "set" in t &&
                  void 0 !== t.set(this, o, "value")) ||
                  (this.value = o));
            }))
          : o
          ? (t = p.valHooks[o.type] || p.valHooks[o.nodeName.toLowerCase()]) &&
            "get" in t &&
            void 0 !== (n = t.get(o, "value"))
            ? n
            : "string" == typeof (n = o.value)
            ? n.replace(pt, "")
            : null == n
            ? ""
            : n
          : void 0;
      },
    }),
      p.extend({
        valHooks: {
          option: {
            get: function (e) {
              var t = p.find.attr(e, "value");
              return null != t ? t : p.trim(p.text(e));
            },
          },
          select: {
            get: function (e) {
              for (
                var t,
                  n,
                  i = e.options,
                  o = e.selectedIndex,
                  r = "select-one" === e.type || 0 > o,
                  s = r ? null : [],
                  a = r ? o + 1 : i.length,
                  l = 0 > o ? a : r ? o : 0;
                a > l;
                l++
              )
                if (
                  !(
                    (!(n = i[l]).selected && l !== o) ||
                    (u.optDisabled
                      ? n.disabled
                      : null !== n.getAttribute("disabled")) ||
                    (n.parentNode.disabled &&
                      p.nodeName(n.parentNode, "optgroup"))
                  )
                ) {
                  if (((t = p(n).val()), r)) return t;
                  s.push(t);
                }
              return s;
            },
            set: function (e, t) {
              for (
                var n, i, o = e.options, r = p.makeArray(t), s = o.length;
                s--;

              )
                if (((i = o[s]), p.inArray(p.valHooks.option.get(i), r) >= 0))
                  try {
                    i.selected = n = !0;
                  } catch (e) {
                    i.scrollHeight;
                  }
                else i.selected = !1;
              return n || (e.selectedIndex = -1), o;
            },
          },
        },
      }),
      p.each(["radio", "checkbox"], function () {
        (p.valHooks[this] = {
          set: function (e, t) {
            return p.isArray(t)
              ? (e.checked = p.inArray(p(e).val(), t) >= 0)
              : void 0;
          },
        }),
          u.checkOn ||
            (p.valHooks[this].get = function (e) {
              return null === e.getAttribute("value") ? "on" : e.value;
            });
      });
    var ft,
      ht,
      mt = p.expr.attrHandle,
      gt = /^(?:checked|selected)$/i,
      vt = u.getSetAttribute,
      yt = u.input;
    p.fn.extend({
      attr: function (e, t) {
        return U(this, p.attr, e, t, arguments.length > 1);
      },
      removeAttr: function (e) {
        return this.each(function () {
          p.removeAttr(this, e);
        });
      },
    }),
      p.extend({
        attr: function (e, t, n) {
          var i,
            o,
            r = e.nodeType;
          if (e && 3 !== r && 8 !== r && 2 !== r)
            return typeof e.getAttribute === j
              ? p.prop(e, t, n)
              : ((1 === r && p.isXMLDoc(e)) ||
                  ((t = t.toLowerCase()),
                  (i =
                    p.attrHooks[t] || (p.expr.match.bool.test(t) ? ht : ft))),
                void 0 === n
                  ? i && "get" in i && null !== (o = i.get(e, t))
                    ? o
                    : null == (o = p.find.attr(e, t))
                    ? void 0
                    : o
                  : null !== n
                  ? i && "set" in i && void 0 !== (o = i.set(e, n, t))
                    ? o
                    : (e.setAttribute(t, n + ""), n)
                  : void p.removeAttr(e, t));
        },
        removeAttr: function (e, t) {
          var n,
            i,
            o = 0,
            r = t && t.match($);
          if (r && 1 === e.nodeType)
            for (; (n = r[o++]); )
              (i = p.propFix[n] || n),
                p.expr.match.bool.test(n)
                  ? (yt && vt) || !gt.test(n)
                    ? (e[i] = !1)
                    : (e[p.camelCase("default-" + n)] = e[i] = !1)
                  : p.attr(e, n, ""),
                e.removeAttribute(vt ? n : i);
        },
        attrHooks: {
          type: {
            set: function (e, t) {
              if (!u.radioValue && "radio" === t && p.nodeName(e, "input")) {
                var n = e.value;
                return e.setAttribute("type", t), n && (e.value = n), t;
              }
            },
          },
        },
      }),
      (ht = {
        set: function (e, t, n) {
          return (
            !1 === t
              ? p.removeAttr(e, n)
              : (yt && vt) || !gt.test(n)
              ? e.setAttribute((!vt && p.propFix[n]) || n, n)
              : (e[p.camelCase("default-" + n)] = e[n] = !0),
            n
          );
        },
      }),
      p.each(p.expr.match.bool.source.match(/\w+/g), function (e, t) {
        var n = mt[t] || p.find.attr;
        mt[t] =
          (yt && vt) || !gt.test(t)
            ? function (e, t, i) {
                var o, r;
                return (
                  i ||
                    ((r = mt[t]),
                    (mt[t] = o),
                    (o = null != n(e, t, i) ? t.toLowerCase() : null),
                    (mt[t] = r)),
                  o
                );
              }
            : function (e, t, n) {
                return n
                  ? void 0
                  : e[p.camelCase("default-" + t)]
                  ? t.toLowerCase()
                  : null;
              };
      }),
      (yt && vt) ||
        (p.attrHooks.value = {
          set: function (e, t, n) {
            return p.nodeName(e, "input")
              ? void (e.defaultValue = t)
              : ft && ft.set(e, t, n);
          },
        }),
      vt ||
        ((ft = {
          set: function (e, t, n) {
            var i = e.getAttributeNode(n);
            return (
              i || e.setAttributeNode((i = e.ownerDocument.createAttribute(n))),
              (i.value = t += ""),
              "value" === n || t === e.getAttribute(n) ? t : void 0
            );
          },
        }),
        (mt.id =
          mt.name =
          mt.coords =
            function (e, t, n) {
              var i;
              return n
                ? void 0
                : (i = e.getAttributeNode(t)) && "" !== i.value
                ? i.value
                : null;
            }),
        (p.valHooks.button = {
          get: function (e, t) {
            var n = e.getAttributeNode(t);
            return n && n.specified ? n.value : void 0;
          },
          set: ft.set,
        }),
        (p.attrHooks.contenteditable = {
          set: function (e, t, n) {
            ft.set(e, "" !== t && t, n);
          },
        }),
        p.each(["width", "height"], function (e, t) {
          p.attrHooks[t] = {
            set: function (e, n) {
              return "" === n ? (e.setAttribute(t, "auto"), n) : void 0;
            },
          };
        })),
      u.style ||
        (p.attrHooks.style = {
          get: function (e) {
            return e.style.cssText || void 0;
          },
          set: function (e, t) {
            return (e.style.cssText = t + "");
          },
        });
    var bt = /^(?:input|select|textarea|button|object)$/i,
      wt = /^(?:a|area)$/i;
    p.fn.extend({
      prop: function (e, t) {
        return U(this, p.prop, e, t, arguments.length > 1);
      },
      removeProp: function (e) {
        return (
          (e = p.propFix[e] || e),
          this.each(function () {
            try {
              (this[e] = void 0), delete this[e];
            } catch (e) {}
          })
        );
      },
    }),
      p.extend({
        propFix: { for: "htmlFor", class: "className" },
        prop: function (e, t, n) {
          var i,
            o,
            r = e.nodeType;
          if (e && 3 !== r && 8 !== r && 2 !== r)
            return (
              (1 !== r || !p.isXMLDoc(e)) &&
                ((t = p.propFix[t] || t), (o = p.propHooks[t])),
              void 0 !== n
                ? o && "set" in o && void 0 !== (i = o.set(e, n, t))
                  ? i
                  : (e[t] = n)
                : o && "get" in o && null !== (i = o.get(e, t))
                ? i
                : e[t]
            );
        },
        propHooks: {
          tabIndex: {
            get: function (e) {
              var t = p.find.attr(e, "tabindex");
              return t
                ? parseInt(t, 10)
                : bt.test(e.nodeName) || (wt.test(e.nodeName) && e.href)
                ? 0
                : -1;
            },
          },
        },
      }),
      u.hrefNormalized ||
        p.each(["href", "src"], function (e, t) {
          p.propHooks[t] = {
            get: function (e) {
              return e.getAttribute(t, 4);
            },
          };
        }),
      u.optSelected ||
        (p.propHooks.selected = {
          get: function (e) {
            var t = e.parentNode;
            return (
              t &&
                (t.selectedIndex, t.parentNode && t.parentNode.selectedIndex),
              null
            );
          },
        }),
      p.each(
        [
          "tabIndex",
          "readOnly",
          "maxLength",
          "cellSpacing",
          "cellPadding",
          "rowSpan",
          "colSpan",
          "useMap",
          "frameBorder",
          "contentEditable",
        ],
        function () {
          p.propFix[this.toLowerCase()] = this;
        }
      ),
      u.enctype || (p.propFix.enctype = "encoding");
    var xt = /[\t\r\n\f]/g;
    p.fn.extend({
      addClass: function (e) {
        var t,
          n,
          i,
          o,
          r,
          s,
          a = 0,
          l = this.length,
          c = "string" == typeof e && e;
        if (p.isFunction(e))
          return this.each(function (t) {
            p(this).addClass(e.call(this, t, this.className));
          });
        if (c)
          for (t = (e || "").match($) || []; l > a; a++)
            if (
              (i =
                1 === (n = this[a]).nodeType &&
                (n.className
                  ? (" " + n.className + " ").replace(xt, " ")
                  : " "))
            ) {
              for (r = 0; (o = t[r++]); )
                i.indexOf(" " + o + " ") < 0 && (i += o + " ");
              (s = p.trim(i)), n.className !== s && (n.className = s);
            }
        return this;
      },
      removeClass: function (e) {
        var t,
          n,
          i,
          o,
          r,
          s,
          a = 0,
          l = this.length,
          c = 0 === arguments.length || ("string" == typeof e && e);
        if (p.isFunction(e))
          return this.each(function (t) {
            p(this).removeClass(e.call(this, t, this.className));
          });
        if (c)
          for (t = (e || "").match($) || []; l > a; a++)
            if (
              (i =
                1 === (n = this[a]).nodeType &&
                (n.className ? (" " + n.className + " ").replace(xt, " ") : ""))
            ) {
              for (r = 0; (o = t[r++]); )
                for (; i.indexOf(" " + o + " ") >= 0; )
                  i = i.replace(" " + o + " ", " ");
              (s = e ? p.trim(i) : ""), n.className !== s && (n.className = s);
            }
        return this;
      },
      toggleClass: function (e, t) {
        var n = typeof e;
        return "boolean" == typeof t && "string" === n
          ? t
            ? this.addClass(e)
            : this.removeClass(e)
          : this.each(
              p.isFunction(e)
                ? function (n) {
                    p(this).toggleClass(e.call(this, n, this.className, t), t);
                  }
                : function () {
                    if ("string" === n)
                      for (
                        var t, i = 0, o = p(this), r = e.match($) || [];
                        (t = r[i++]);

                      )
                        o.hasClass(t) ? o.removeClass(t) : o.addClass(t);
                    else
                      (n === j || "boolean" === n) &&
                        (this.className &&
                          p._data(this, "__className__", this.className),
                        (this.className =
                          this.className || !1 === e
                            ? ""
                            : p._data(this, "__className__") || ""));
                  }
            );
      },
      hasClass: function (e) {
        for (var t = " " + e + " ", n = 0, i = this.length; i > n; n++)
          if (
            1 === this[n].nodeType &&
            (" " + this[n].className + " ").replace(xt, " ").indexOf(t) >= 0
          )
            return !0;
        return !1;
      },
    }),
      p.each(
        "blur focus focusin focusout load resize scroll unload click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup error contextmenu".split(
          " "
        ),
        function (e, t) {
          p.fn[t] = function (e, n) {
            return arguments.length > 0
              ? this.on(t, null, e, n)
              : this.trigger(t);
          };
        }
      ),
      p.fn.extend({
        hover: function (e, t) {
          return this.mouseenter(e).mouseleave(t || e);
        },
        bind: function (e, t, n) {
          return this.on(e, null, t, n);
        },
        unbind: function (e, t) {
          return this.off(e, null, t);
        },
        delegate: function (e, t, n, i) {
          return this.on(t, e, n, i);
        },
        undelegate: function (e, t, n) {
          return 1 === arguments.length
            ? this.off(e, "**")
            : this.off(t, e || "**", n);
        },
      });
    var Ct = p.now(),
      Tt = /\?/,
      Et =
        /(,)|(\[|{)|(}|])|"(?:[^"\\\r\n]|\\["\\\/bfnrt]|\\u[\da-fA-F]{4})*"\s*:?|true|false|null|-?(?!0\d)\d+(?:\.\d+|)(?:[eE][+-]?\d+|)/g;
    (p.parseJSON = function (t) {
      if (e.JSON && e.JSON.parse) return e.JSON.parse(t + "");
      var n,
        i = null,
        o = p.trim(t + "");
      return o &&
        !p.trim(
          o.replace(Et, function (e, t, o, r) {
            return (
              n && t && (i = 0),
              0 === i ? e : ((n = o || t), (i += !r - !o), "")
            );
          })
        )
        ? Function("return " + o)()
        : p.error("Invalid JSON: " + t);
    }),
      (p.parseXML = function (t) {
        var n;
        if (!t || "string" != typeof t) return null;
        try {
          e.DOMParser
            ? (n = new DOMParser().parseFromString(t, "text/xml"))
            : (((n = new ActiveXObject("Microsoft.XMLDOM")).async = "false"),
              n.loadXML(t));
        } catch (e) {
          n = void 0;
        }
        return (
          (n &&
            n.documentElement &&
            !n.getElementsByTagName("parsererror").length) ||
            p.error("Invalid XML: " + t),
          n
        );
      });
    var kt,
      _t,
      St = /#.*$/,
      Nt = /([?&])_=[^&]*/,
      At = /^(.*?):[ \t]*([^\r\n]*)\r?$/gm,
      $t = /^(?:GET|HEAD)$/,
      It = /^\/\//,
      Dt = /^([\w.+-]+:)(?:\/\/(?:[^\/?#]*@|)([^\/?#:]*)(?::(\d+)|)|)/,
      Ot = {},
      Lt = {},
      jt = "*/".concat("*");
    try {
      _t = location.href;
    } catch (e) {
      ((_t = E.createElement("a")).href = ""), (_t = _t.href);
    }
    function Pt(e) {
      return function (t, n) {
        "string" != typeof t && ((n = t), (t = "*"));
        var i,
          o = 0,
          r = t.toLowerCase().match($) || [];
        if (p.isFunction(n))
          for (; (i = r[o++]); )
            "+" === i.charAt(0)
              ? ((i = i.slice(1) || "*"), (e[i] = e[i] || []).unshift(n))
              : (e[i] = e[i] || []).push(n);
      };
    }
    function Mt(e, t, n, i) {
      var o = {},
        r = e === Lt;
      function s(a) {
        var l;
        return (
          (o[a] = !0),
          p.each(e[a] || [], function (e, a) {
            var c = a(t, n, i);
            return "string" != typeof c || r || o[c]
              ? r
                ? !(l = c)
                : void 0
              : (t.dataTypes.unshift(c), s(c), !1);
          }),
          l
        );
      }
      return s(t.dataTypes[0]) || (!o["*"] && s("*"));
    }
    function zt(e, t) {
      var n,
        i,
        o = p.ajaxSettings.flatOptions || {};
      for (i in t) void 0 !== t[i] && ((o[i] ? e : n || (n = {}))[i] = t[i]);
      return n && p.extend(!0, e, n), e;
    }
    (kt = Dt.exec(_t.toLowerCase()) || []),
      p.extend({
        active: 0,
        lastModified: {},
        etag: {},
        ajaxSettings: {
          url: _t,
          type: "GET",
          isLocal:
            /^(?:about|app|app-storage|.+-extension|file|res|widget):$/.test(
              kt[1]
            ),
          global: !0,
          processData: !0,
          async: !0,
          contentType: "application/x-www-form-urlencoded; charset=UTF-8",
          accepts: {
            "*": jt,
            text: "text/plain",
            html: "text/html",
            xml: "application/xml, text/xml",
            json: "application/json, text/javascript",
          },
          contents: { xml: /xml/, html: /html/, json: /json/ },
          responseFields: {
            xml: "responseXML",
            text: "responseText",
            json: "responseJSON",
          },
          converters: {
            "* text": String,
            "text html": !0,
            "text json": p.parseJSON,
            "text xml": p.parseXML,
          },
          flatOptions: { url: !0, context: !0 },
        },
        ajaxSetup: function (e, t) {
          return t ? zt(zt(e, p.ajaxSettings), t) : zt(p.ajaxSettings, e);
        },
        ajaxPrefilter: Pt(Ot),
        ajaxTransport: Pt(Lt),
        ajax: function (e, t) {
          "object" == typeof e && ((t = e), (e = void 0)), (t = t || {});
          var n,
            i,
            o,
            r,
            s,
            a,
            l,
            c,
            u = p.ajaxSetup({}, t),
            d = u.context || u,
            f = u.context && (d.nodeType || d.jquery) ? p(d) : p.event,
            h = p.Deferred(),
            m = p.Callbacks("once memory"),
            g = u.statusCode || {},
            v = {},
            y = {},
            b = 0,
            w = "canceled",
            x = {
              readyState: 0,
              getResponseHeader: function (e) {
                var t;
                if (2 === b) {
                  if (!c)
                    for (c = {}; (t = At.exec(r)); )
                      c[t[1].toLowerCase()] = t[2];
                  t = c[e.toLowerCase()];
                }
                return null == t ? null : t;
              },
              getAllResponseHeaders: function () {
                return 2 === b ? r : null;
              },
              setRequestHeader: function (e, t) {
                var n = e.toLowerCase();
                return b || ((e = y[n] = y[n] || e), (v[e] = t)), this;
              },
              overrideMimeType: function (e) {
                return b || (u.mimeType = e), this;
              },
              statusCode: function (e) {
                var t;
                if (e)
                  if (2 > b) for (t in e) g[t] = [g[t], e[t]];
                  else x.always(e[x.status]);
                return this;
              },
              abort: function (e) {
                var t = e || w;
                return l && l.abort(t), C(0, t), this;
              },
            };
          if (
            ((h.promise(x).complete = m.add),
            (x.success = x.done),
            (x.error = x.fail),
            (u.url = ((e || u.url || _t) + "")
              .replace(St, "")
              .replace(It, kt[1] + "//")),
            (u.type = t.method || t.type || u.method || u.type),
            (u.dataTypes = p
              .trim(u.dataType || "*")
              .toLowerCase()
              .match($) || [""]),
            null == u.crossDomain &&
              ((n = Dt.exec(u.url.toLowerCase())),
              (u.crossDomain = !(
                !n ||
                (n[1] === kt[1] &&
                  n[2] === kt[2] &&
                  (n[3] || ("http:" === n[1] ? "80" : "443")) ===
                    (kt[3] || ("http:" === kt[1] ? "80" : "443")))
              ))),
            u.data &&
              u.processData &&
              "string" != typeof u.data &&
              (u.data = p.param(u.data, u.traditional)),
            Mt(Ot, u, t, x),
            2 === b)
          )
            return x;
          for (i in ((a = p.event && u.global) &&
            0 == p.active++ &&
            p.event.trigger("ajaxStart"),
          (u.type = u.type.toUpperCase()),
          (u.hasContent = !$t.test(u.type)),
          (o = u.url),
          u.hasContent ||
            (u.data &&
              ((o = u.url += (Tt.test(o) ? "&" : "?") + u.data), delete u.data),
            !1 === u.cache &&
              (u.url = Nt.test(o)
                ? o.replace(Nt, "$1_=" + Ct++)
                : o + (Tt.test(o) ? "&" : "?") + "_=" + Ct++)),
          u.ifModified &&
            (p.lastModified[o] &&
              x.setRequestHeader("If-Modified-Since", p.lastModified[o]),
            p.etag[o] && x.setRequestHeader("If-None-Match", p.etag[o])),
          ((u.data && u.hasContent && !1 !== u.contentType) || t.contentType) &&
            x.setRequestHeader("Content-Type", u.contentType),
          x.setRequestHeader(
            "Accept",
            u.dataTypes[0] && u.accepts[u.dataTypes[0]]
              ? u.accepts[u.dataTypes[0]] +
                  ("*" !== u.dataTypes[0] ? ", " + jt + "; q=0.01" : "")
              : u.accepts["*"]
          ),
          u.headers))
            x.setRequestHeader(i, u.headers[i]);
          if (u.beforeSend && (!1 === u.beforeSend.call(d, x, u) || 2 === b))
            return x.abort();
          for (i in ((w = "abort"), { success: 1, error: 1, complete: 1 }))
            x[i](u[i]);
          if ((l = Mt(Lt, u, t, x))) {
            (x.readyState = 1),
              a && f.trigger("ajaxSend", [x, u]),
              u.async &&
                u.timeout > 0 &&
                (s = setTimeout(function () {
                  x.abort("timeout");
                }, u.timeout));
            try {
              (b = 1), l.send(v, C);
            } catch (e) {
              if (!(2 > b)) throw e;
              C(-1, e);
            }
          } else C(-1, "No Transport");
          function C(e, t, n, i) {
            var c,
              v,
              y,
              w,
              C,
              T = t;
            2 !== b &&
              ((b = 2),
              s && clearTimeout(s),
              (l = void 0),
              (r = i || ""),
              (x.readyState = e > 0 ? 4 : 0),
              (c = (e >= 200 && 300 > e) || 304 === e),
              n &&
                (w = (function (e, t, n) {
                  for (
                    var i, o, r, s, a = e.contents, l = e.dataTypes;
                    "*" === l[0];

                  )
                    l.shift(),
                      void 0 === o &&
                        (o = e.mimeType || t.getResponseHeader("Content-Type"));
                  if (o)
                    for (s in a)
                      if (a[s] && a[s].test(o)) {
                        l.unshift(s);
                        break;
                      }
                  if (l[0] in n) r = l[0];
                  else {
                    for (s in n) {
                      if (!l[0] || e.converters[s + " " + l[0]]) {
                        r = s;
                        break;
                      }
                      i || (i = s);
                    }
                    r = r || i;
                  }
                  return r ? (r !== l[0] && l.unshift(r), n[r]) : void 0;
                })(u, x, n)),
              (w = (function (e, t, n, i) {
                var o,
                  r,
                  s,
                  a,
                  l,
                  c = {},
                  u = e.dataTypes.slice();
                if (u[1])
                  for (s in e.converters) c[s.toLowerCase()] = e.converters[s];
                for (r = u.shift(); r; )
                  if (
                    (e.responseFields[r] && (n[e.responseFields[r]] = t),
                    !l &&
                      i &&
                      e.dataFilter &&
                      (t = e.dataFilter(t, e.dataType)),
                    (l = r),
                    (r = u.shift()))
                  )
                    if ("*" === r) r = l;
                    else if ("*" !== l && l !== r) {
                      if (!(s = c[l + " " + r] || c["* " + r]))
                        for (o in c)
                          if (
                            (a = o.split(" "))[1] === r &&
                            (s = c[l + " " + a[0]] || c["* " + a[0]])
                          ) {
                            !0 === s
                              ? (s = c[o])
                              : !0 !== c[o] && ((r = a[0]), u.unshift(a[1]));
                            break;
                          }
                      if (!0 !== s)
                        if (s && e.throws) t = s(t);
                        else
                          try {
                            t = s(t);
                          } catch (e) {
                            return {
                              state: "parsererror",
                              error: s
                                ? e
                                : "No conversion from " + l + " to " + r,
                            };
                          }
                    }
                return { state: "success", data: t };
              })(u, w, x, c)),
              c
                ? (u.ifModified &&
                    ((C = x.getResponseHeader("Last-Modified")) &&
                      (p.lastModified[o] = C),
                    (C = x.getResponseHeader("etag")) && (p.etag[o] = C)),
                  204 === e || "HEAD" === u.type
                    ? (T = "nocontent")
                    : 304 === e
                    ? (T = "notmodified")
                    : ((T = w.state), (v = w.data), (c = !(y = w.error))))
                : ((y = T), (e || !T) && ((T = "error"), 0 > e && (e = 0))),
              (x.status = e),
              (x.statusText = (t || T) + ""),
              c ? h.resolveWith(d, [v, T, x]) : h.rejectWith(d, [x, T, y]),
              x.statusCode(g),
              (g = void 0),
              a &&
                f.trigger(c ? "ajaxSuccess" : "ajaxError", [x, u, c ? v : y]),
              m.fireWith(d, [x, T]),
              a &&
                (f.trigger("ajaxComplete", [x, u]),
                --p.active || p.event.trigger("ajaxStop")));
          }
          return x;
        },
        getJSON: function (e, t, n) {
          return p.get(e, t, n, "json");
        },
        getScript: function (e, t) {
          return p.get(e, void 0, t, "script");
        },
      }),
      p.each(["get", "post"], function (e, t) {
        p[t] = function (e, n, i, o) {
          return (
            p.isFunction(n) && ((o = o || i), (i = n), (n = void 0)),
            p.ajax({ url: e, type: t, dataType: o, data: n, success: i })
          );
        };
      }),
      (p._evalUrl = function (e) {
        return p.ajax({
          url: e,
          type: "GET",
          dataType: "script",
          async: !1,
          global: !1,
          throws: !0,
        });
      }),
      p.fn.extend({
        wrapAll: function (e) {
          if (p.isFunction(e))
            return this.each(function (t) {
              p(this).wrapAll(e.call(this, t));
            });
          if (this[0]) {
            var t = p(e, this[0].ownerDocument).eq(0).clone(!0);
            this[0].parentNode && t.insertBefore(this[0]),
              t
                .map(function () {
                  for (
                    var e = this;
                    e.firstChild && 1 === e.firstChild.nodeType;

                  )
                    e = e.firstChild;
                  return e;
                })
                .append(this);
          }
          return this;
        },
        wrapInner: function (e) {
          return this.each(
            p.isFunction(e)
              ? function (t) {
                  p(this).wrapInner(e.call(this, t));
                }
              : function () {
                  var t = p(this),
                    n = t.contents();
                  n.length ? n.wrapAll(e) : t.append(e);
                }
          );
        },
        wrap: function (e) {
          var t = p.isFunction(e);
          return this.each(function (n) {
            p(this).wrapAll(t ? e.call(this, n) : e);
          });
        },
        unwrap: function () {
          return this.parent()
            .each(function () {
              p.nodeName(this, "body") || p(this).replaceWith(this.childNodes);
            })
            .end();
        },
      }),
      (p.expr.filters.hidden = function (e) {
        return (
          (e.offsetWidth <= 0 && e.offsetHeight <= 0) ||
          (!u.reliableHiddenOffsets() &&
            "none" === ((e.style && e.style.display) || p.css(e, "display")))
        );
      }),
      (p.expr.filters.visible = function (e) {
        return !p.expr.filters.hidden(e);
      });
    var Ht = /%20/g,
      Rt = /\[\]$/,
      Wt = /\r?\n/g,
      Ft = /^(?:submit|button|image|reset|file)$/i,
      Bt = /^(?:input|select|textarea|keygen)/i;
    function qt(e, t, n, i) {
      var o;
      if (p.isArray(t))
        p.each(t, function (t, o) {
          n || Rt.test(e)
            ? i(e, o)
            : qt(e + "[" + ("object" == typeof o ? t : "") + "]", o, n, i);
        });
      else if (n || "object" !== p.type(t)) i(e, t);
      else for (o in t) qt(e + "[" + o + "]", t[o], n, i);
    }
    (p.param = function (e, t) {
      var n,
        i = [],
        o = function (e, t) {
          (t = p.isFunction(t) ? t() : null == t ? "" : t),
            (i[i.length] = encodeURIComponent(e) + "=" + encodeURIComponent(t));
        };
      if (
        (void 0 === t && (t = p.ajaxSettings && p.ajaxSettings.traditional),
        p.isArray(e) || (e.jquery && !p.isPlainObject(e)))
      )
        p.each(e, function () {
          o(this.name, this.value);
        });
      else for (n in e) qt(n, e[n], t, o);
      return i.join("&").replace(Ht, "+");
    }),
      p.fn.extend({
        serialize: function () {
          return p.param(this.serializeArray());
        },
        serializeArray: function () {
          return this.map(function () {
            var e = p.prop(this, "elements");
            return e ? p.makeArray(e) : this;
          })
            .filter(function () {
              var e = this.type;
              return (
                this.name &&
                !p(this).is(":disabled") &&
                Bt.test(this.nodeName) &&
                !Ft.test(e) &&
                (this.checked || !V.test(e))
              );
            })
            .map(function (e, t) {
              var n = p(this).val();
              return null == n
                ? null
                : p.isArray(n)
                ? p.map(n, function (e) {
                    return { name: t.name, value: e.replace(Wt, "\r\n") };
                  })
                : { name: t.name, value: n.replace(Wt, "\r\n") };
            })
            .get();
        },
      }),
      (p.ajaxSettings.xhr =
        void 0 !== e.ActiveXObject
          ? function () {
              return (
                (!this.isLocal &&
                  /^(get|post|head|put|delete|options)$/i.test(this.type) &&
                  Qt()) ||
                (function () {
                  try {
                    return new e.ActiveXObject("Microsoft.XMLHTTP");
                  } catch (e) {}
                })()
              );
            }
          : Qt);
    var Ut = 0,
      Vt = {},
      Xt = p.ajaxSettings.xhr();
    function Qt() {
      try {
        return new e.XMLHttpRequest();
      } catch (e) {}
    }
    e.attachEvent &&
      e.attachEvent("onunload", function () {
        for (var e in Vt) Vt[e](void 0, !0);
      }),
      (u.cors = !!Xt && "withCredentials" in Xt),
      (Xt = u.ajax = !!Xt) &&
        p.ajaxTransport(function (e) {
          var t;
          if (!e.crossDomain || u.cors)
            return {
              send: function (n, i) {
                var o,
                  r = e.xhr(),
                  s = ++Ut;
                if (
                  (r.open(e.type, e.url, e.async, e.username, e.password),
                  e.xhrFields)
                )
                  for (o in e.xhrFields) r[o] = e.xhrFields[o];
                for (o in (e.mimeType &&
                  r.overrideMimeType &&
                  r.overrideMimeType(e.mimeType),
                e.crossDomain ||
                  n["X-Requested-With"] ||
                  (n["X-Requested-With"] = "XMLHttpRequest"),
                n))
                  void 0 !== n[o] && r.setRequestHeader(o, n[o] + "");
                r.send((e.hasContent && e.data) || null),
                  (t = function (n, o) {
                    var a, l, c;
                    if (t && (o || 4 === r.readyState))
                      if (
                        (delete Vt[s],
                        (t = void 0),
                        (r.onreadystatechange = p.noop),
                        o)
                      )
                        4 !== r.readyState && r.abort();
                      else {
                        (c = {}),
                          (a = r.status),
                          "string" == typeof r.responseText &&
                            (c.text = r.responseText);
                        try {
                          l = r.statusText;
                        } catch (e) {
                          l = "";
                        }
                        a || !e.isLocal || e.crossDomain
                          ? 1223 === a && (a = 204)
                          : (a = c.text ? 200 : 404);
                      }
                    c && i(a, l, c, r.getAllResponseHeaders());
                  }),
                  e.async
                    ? 4 === r.readyState
                      ? setTimeout(t)
                      : (r.onreadystatechange = Vt[s] = t)
                    : t();
              },
              abort: function () {
                t && t(void 0, !0);
              },
            };
        }),
      p.ajaxSetup({
        accepts: {
          script:
            "text/javascript, application/javascript, application/ecmascript, application/x-ecmascript",
        },
        contents: { script: /(?:java|ecma)script/ },
        converters: {
          "text script": function (e) {
            return p.globalEval(e), e;
          },
        },
      }),
      p.ajaxPrefilter("script", function (e) {
        void 0 === e.cache && (e.cache = !1),
          e.crossDomain && ((e.type = "GET"), (e.global = !1));
      }),
      p.ajaxTransport("script", function (e) {
        if (e.crossDomain) {
          var t,
            n = E.head || p("head")[0] || E.documentElement;
          return {
            send: function (i, o) {
              ((t = E.createElement("script")).async = !0),
                e.scriptCharset && (t.charset = e.scriptCharset),
                (t.src = e.url),
                (t.onload = t.onreadystatechange =
                  function (e, n) {
                    (n ||
                      !t.readyState ||
                      /loaded|complete/.test(t.readyState)) &&
                      ((t.onload = t.onreadystatechange = null),
                      t.parentNode && t.parentNode.removeChild(t),
                      (t = null),
                      n || o(200, "success"));
                  }),
                n.insertBefore(t, n.firstChild);
            },
            abort: function () {
              t && t.onload(void 0, !0);
            },
          };
        }
      });
    var Gt = [],
      Kt = /(=)\?(?=&|$)|\?\?/;
    p.ajaxSetup({
      jsonp: "callback",
      jsonpCallback: function () {
        var e = Gt.pop() || p.expando + "_" + Ct++;
        return (this[e] = !0), e;
      },
    }),
      p.ajaxPrefilter("json jsonp", function (t, n, i) {
        var o,
          r,
          s,
          a =
            !1 !== t.jsonp &&
            (Kt.test(t.url)
              ? "url"
              : "string" == typeof t.data &&
                !(t.contentType || "").indexOf(
                  "application/x-www-form-urlencoded"
                ) &&
                Kt.test(t.data) &&
                "data");
        return a || "jsonp" === t.dataTypes[0]
          ? ((o = t.jsonpCallback =
              p.isFunction(t.jsonpCallback)
                ? t.jsonpCallback()
                : t.jsonpCallback),
            a
              ? (t[a] = t[a].replace(Kt, "$1" + o))
              : !1 !== t.jsonp &&
                (t.url += (Tt.test(t.url) ? "&" : "?") + t.jsonp + "=" + o),
            (t.converters["script json"] = function () {
              return s || p.error(o + " was not called"), s[0];
            }),
            (t.dataTypes[0] = "json"),
            (r = e[o]),
            (e[o] = function () {
              s = arguments;
            }),
            i.always(function () {
              (e[o] = r),
                t[o] && ((t.jsonpCallback = n.jsonpCallback), Gt.push(o)),
                s && p.isFunction(r) && r(s[0]),
                (s = r = void 0);
            }),
            "script")
          : void 0;
      }),
      (p.parseHTML = function (e, t, n) {
        if (!e || "string" != typeof e) return null;
        "boolean" == typeof t && ((n = t), (t = !1)), (t = t || E);
        var i = w.exec(e),
          o = !n && [];
        return i
          ? [t.createElement(i[1])]
          : ((i = p.buildFragment([e], t, o)),
            o && o.length && p(o).remove(),
            p.merge([], i.childNodes));
      });
    var Yt = p.fn.load;
    (p.fn.load = function (e, t, n) {
      if ("string" != typeof e && Yt) return Yt.apply(this, arguments);
      var i,
        o,
        r,
        s = this,
        a = e.indexOf(" ");
      return (
        a >= 0 && ((i = p.trim(e.slice(a, e.length))), (e = e.slice(0, a))),
        p.isFunction(t)
          ? ((n = t), (t = void 0))
          : t && "object" == typeof t && (r = "POST"),
        s.length > 0 &&
          p
            .ajax({ url: e, type: r, dataType: "html", data: t })
            .done(function (e) {
              (o = arguments),
                s.html(i ? p("<div>").append(p.parseHTML(e)).find(i) : e);
            })
            .complete(
              n &&
                function (e, t) {
                  s.each(n, o || [e.responseText, t, e]);
                }
            ),
        this
      );
    }),
      p.each(
        [
          "ajaxStart",
          "ajaxStop",
          "ajaxComplete",
          "ajaxError",
          "ajaxSuccess",
          "ajaxSend",
        ],
        function (e, t) {
          p.fn[t] = function (e) {
            return this.on(t, e);
          };
        }
      ),
      (p.expr.filters.animated = function (e) {
        return p.grep(p.timers, function (t) {
          return e === t.elem;
        }).length;
      });
    var Zt = e.document.documentElement;
    function Jt(e) {
      return p.isWindow(e)
        ? e
        : 9 === e.nodeType && (e.defaultView || e.parentWindow);
    }
    (p.offset = {
      setOffset: function (e, t, n) {
        var i,
          o,
          r,
          s,
          a,
          l,
          c = p.css(e, "position"),
          u = p(e),
          d = {};
        "static" === c && (e.style.position = "relative"),
          (a = u.offset()),
          (r = p.css(e, "top")),
          (l = p.css(e, "left")),
          ("absolute" === c || "fixed" === c) && p.inArray("auto", [r, l]) > -1
            ? ((s = (i = u.position()).top), (o = i.left))
            : ((s = parseFloat(r) || 0), (o = parseFloat(l) || 0)),
          p.isFunction(t) && (t = t.call(e, n, a)),
          null != t.top && (d.top = t.top - a.top + s),
          null != t.left && (d.left = t.left - a.left + o),
          "using" in t ? t.using.call(e, d) : u.css(d);
      },
    }),
      p.fn.extend({
        offset: function (e) {
          if (arguments.length)
            return void 0 === e
              ? this
              : this.each(function (t) {
                  p.offset.setOffset(this, e, t);
                });
          var t,
            n,
            i = { top: 0, left: 0 },
            o = this[0],
            r = o && o.ownerDocument;
          return r
            ? ((t = r.documentElement),
              p.contains(t, o)
                ? (typeof o.getBoundingClientRect !== j &&
                    (i = o.getBoundingClientRect()),
                  (n = Jt(r)),
                  {
                    top:
                      i.top +
                      (n.pageYOffset || t.scrollTop) -
                      (t.clientTop || 0),
                    left:
                      i.left +
                      (n.pageXOffset || t.scrollLeft) -
                      (t.clientLeft || 0),
                  })
                : i)
            : void 0;
        },
        position: function () {
          if (this[0]) {
            var e,
              t,
              n = { top: 0, left: 0 },
              i = this[0];
            return (
              "fixed" === p.css(i, "position")
                ? (t = i.getBoundingClientRect())
                : ((e = this.offsetParent()),
                  (t = this.offset()),
                  p.nodeName(e[0], "html") || (n = e.offset()),
                  (n.top += p.css(e[0], "borderTopWidth", !0)),
                  (n.left += p.css(e[0], "borderLeftWidth", !0))),
              {
                top: t.top - n.top - p.css(i, "marginTop", !0),
                left: t.left - n.left - p.css(i, "marginLeft", !0),
              }
            );
          }
        },
        offsetParent: function () {
          return this.map(function () {
            for (
              var e = this.offsetParent || Zt;
              e && !p.nodeName(e, "html") && "static" === p.css(e, "position");

            )
              e = e.offsetParent;
            return e || Zt;
          });
        },
      }),
      p.each(
        { scrollLeft: "pageXOffset", scrollTop: "pageYOffset" },
        function (e, t) {
          var n = /Y/.test(t);
          p.fn[e] = function (i) {
            return U(
              this,
              function (e, i, o) {
                var r = Jt(e);
                return void 0 === o
                  ? r
                    ? t in r
                      ? r[t]
                      : r.document.documentElement[i]
                    : e[i]
                  : void (r
                      ? r.scrollTo(
                          n ? p(r).scrollLeft() : o,
                          n ? o : p(r).scrollTop()
                        )
                      : (e[i] = o));
              },
              e,
              i,
              arguments.length,
              null
            );
          };
        }
      ),
      p.each(["top", "left"], function (e, t) {
        p.cssHooks[t] = je(u.pixelPosition, function (e, n) {
          return n
            ? ((n = Ie(e, t)), Oe.test(n) ? p(e).position()[t] + "px" : n)
            : void 0;
        });
      }),
      p.each({ Height: "height", Width: "width" }, function (e, t) {
        p.each(
          { padding: "inner" + e, content: t, "": "outer" + e },
          function (n, i) {
            p.fn[i] = function (i, o) {
              var r = arguments.length && (n || "boolean" != typeof i),
                s = n || (!0 === i || !0 === o ? "margin" : "border");
              return U(
                this,
                function (t, n, i) {
                  var o;
                  return p.isWindow(t)
                    ? t.document.documentElement["client" + e]
                    : 9 === t.nodeType
                    ? ((o = t.documentElement),
                      Math.max(
                        t.body["scroll" + e],
                        o["scroll" + e],
                        t.body["offset" + e],
                        o["offset" + e],
                        o["client" + e]
                      ))
                    : void 0 === i
                    ? p.css(t, n, s)
                    : p.style(t, n, i, s);
                },
                t,
                r ? i : void 0,
                r,
                null
              );
            };
          }
        );
      }),
      (p.fn.size = function () {
        return this.length;
      }),
      (p.fn.andSelf = p.fn.addBack),
      "function" == typeof define &&
        define.amd &&
        define("jquery", [], function () {
          return p;
        });
    var en = e.jQuery,
      tn = e.$;
    return (
      (p.noConflict = function (t) {
        return (
          e.$ === p && (e.$ = tn), t && e.jQuery === p && (e.jQuery = en), p
        );
      }),
      typeof t === j && (e.jQuery = e.$ = p),
      p
    );
  }),
  "undefined" == typeof jQuery)
)
  throw new Error("Bootstrap's JavaScript requires jQuery");
function validateEmail(e) {
  return /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(
    e
  );
}
function isSecure() {
  return "https:" == window.location.protocol;
}
function getQueryVariable(e) {
  for (
    var t = window.location.search.substring(1).split("&"), n = 0;
    n < t.length;
    n++
  ) {
    var i = t[n].split("=");
    if (i[0] == e) return i[1];
  }
  return "";
}
function createCookie(e, t, n, i, o) {
  var r = e + "=" + escape(t) + ";";
  if (n) {
    n instanceof Date
      ? isNaN(n.getTime()) && (expire_c = new Date())
      : (expire_c = new Date());
    var s = expire_c.getTime() + 1e3 * parseInt(n) * 60 * 60 * 24;
    expire_c.setTime(s), (r += "expires=" + expire_c.toGMTString() + ";");
  }
  i && (r += "path=" + i + ";"),
    o && (r += "domain=" + o + ";"),
    (document.cookie = r);
}
function getCookie(e) {
  var t = document.cookie,
    n = t.indexOf(" " + e + "=");
  if ((-1 == n && (n = t.indexOf(e + "=")), -1 == n)) t = null;
  else {
    n = t.indexOf("=", n) + 1;
    var i = t.indexOf(";", n);
    -1 == i && (i = t.length), (t = unescape(t.substring(n, i)));
  }
  return t;
}
function scroll_if_anchor(e) {
  e = "string" == typeof e ? e : $(this).attr("href");
  var t = offset_header;
  if (
    1 == $(this).parents(".product-tabs-nav").length ||
    1 == $(this).parents(".panel-title").length
  );
  else if (0 == e.indexOf("#")) {
    var n = $(e);
    if (
      n.length &&
      ($("html, body").animate({ scrollTop: n.offset().top - t }),
      history && "pushState" in history)
    )
      return (
        history.pushState({}, document.title, window.location.pathname + e), !1
      );
  }
}
// function update_mini_cart(e) {
//   var t;
//   t =
//     "" !== e
//       ? "https://shop.naturalwellness.com/ajax-cart-status.asp?gref=" +
//         e +
//         "&amp;callback=?"
//       : "https://shop.naturalwellness.com/ajax-cart-status.asp?callback=?";
//   var n = 0;
//   $.ajax({
//     type: "GET",
//     url: t,
//     async: !1,
//     jsonpCallback: "jsonCallback",
//     contentType: "application/json",
//     dataType: "jsonp",
//     success: function (e) {
//       if (0 !== e.length) {
//         var t = 0,
//           i = "<ul>";
//         $.each(e.cart, function (e, o) {
//           "DISCOUNT" != o.itemNum &&
//             "" !== o.itemNum &&
//             ((n += o.amount - 0),
//             (i +=
//               "<li><h5>" +
//               o.name +
//               "</h5>Qty: " +
//               o.amount +
//               " &ndash; <strong>$" +
//               o.price +
//               "</strong></li>")),
//             (t += 1 * o.price);
//         }),
//           n > 0 &&
//             ((i +=
//               '</ul><p class="subtotal"><strong>Subtotal:</strong> $' +
//               t.toFixed(2) +
//               "</p>"),
//             (i +=
//               '<a class="btn add-to-cart" href="https://shop.naturalwellness.com/basket.asp">View Cart / Checkout</a>'),
//             $(".cart-inner").html(i),
//             n > 9 && (n = "+"),
//             $(".show-cart img").attr(
//               "src",
//               "https://shop.naturalwellness.com/images/template/nav-icon-cart.png"
//             ),
//             $(".show-cart > div").append("<span>" + n + "</span>"));
//       }
//     },
//   });
// }
!(function (e) {
  "use strict";
  var t = jQuery.fn.jquery.split(" ")[0].split(".");
  if (
    (t[0] < 2 && t[1] < 9) ||
    (1 == t[0] && 9 == t[1] && t[2] < 1) ||
    t[0] > 2
  )
    throw new Error(
      "Bootstrap's JavaScript requires jQuery version 1.9.1 or higher, but lower than version 3"
    );
})(),
  (function (e) {
    "use strict";
    (e.fn.emulateTransitionEnd = function (t) {
      var n = !1,
        i = this;
      return (
        e(this).one("bsTransitionEnd", function () {
          n = !0;
        }),
        setTimeout(function () {
          n || e(i).trigger(e.support.transition.end);
        }, t),
        this
      );
    }),
      e(function () {
        (e.support.transition = (function () {
          var e = document.createElement("bootstrap"),
            t = {
              WebkitTransition: "webkitTransitionEnd",
              MozTransition: "transitionend",
              OTransition: "oTransitionEnd otransitionend",
              transition: "transitionend",
            };
          for (var n in t) if (void 0 !== e.style[n]) return { end: t[n] };
          return !1;
        })()),
          e.support.transition &&
            (e.event.special.bsTransitionEnd = {
              bindType: e.support.transition.end,
              delegateType: e.support.transition.end,
              handle: function (t) {
                return e(t.target).is(this)
                  ? t.handleObj.handler.apply(this, arguments)
                  : void 0;
              },
            });
      });
  })(jQuery),
  (function (e) {
    "use strict";
    var t = '[data-dismiss="alert"]',
      n = function (n) {
        e(n).on("click", t, this.close);
      };
    (n.VERSION = "3.3.6"),
      (n.TRANSITION_DURATION = 150),
      (n.prototype.close = function (t) {
        function i() {
          s.detach().trigger("closed.bs.alert").remove();
        }
        var o = e(this),
          r = o.attr("data-target");
        r || (r = (r = o.attr("href")) && r.replace(/.*(?=#[^\s]*$)/, ""));
        var s = e(r);
        t && t.preventDefault(),
          s.length || (s = o.closest(".alert")),
          s.trigger((t = e.Event("close.bs.alert"))),
          t.isDefaultPrevented() ||
            (s.removeClass("in"),
            e.support.transition && s.hasClass("fade")
              ? s
                  .one("bsTransitionEnd", i)
                  .emulateTransitionEnd(n.TRANSITION_DURATION)
              : i());
      });
    var i = e.fn.alert;
    (e.fn.alert = function (t) {
      return this.each(function () {
        var i = e(this),
          o = i.data("bs.alert");
        o || i.data("bs.alert", (o = new n(this))),
          "string" == typeof t && o[t].call(i);
      });
    }),
      (e.fn.alert.Constructor = n),
      (e.fn.alert.noConflict = function () {
        return (e.fn.alert = i), this;
      }),
      e(document).on("click.bs.alert.data-api", t, n.prototype.close);
  })(jQuery),
  (function (e) {
    "use strict";
    function t(t) {
      return this.each(function () {
        var i = e(this),
          o = i.data("bs.button"),
          r = "object" == typeof t && t;
        o || i.data("bs.button", (o = new n(this, r))),
          "toggle" == t ? o.toggle() : t && o.setState(t);
      });
    }
    var n = function (t, i) {
      (this.$element = e(t)),
        (this.options = e.extend({}, n.DEFAULTS, i)),
        (this.isLoading = !1);
    };
    (n.VERSION = "3.3.6"),
      (n.DEFAULTS = { loadingText: "loading..." }),
      (n.prototype.setState = function (t) {
        var n = "disabled",
          i = this.$element,
          o = i.is("input") ? "val" : "html",
          r = i.data();
        (t += "Text"),
          null == r.resetText && i.data("resetText", i[o]()),
          setTimeout(
            e.proxy(function () {
              i[o](null == r[t] ? this.options[t] : r[t]),
                "loadingText" == t
                  ? ((this.isLoading = !0), i.addClass(n).attr(n, n))
                  : this.isLoading &&
                    ((this.isLoading = !1), i.removeClass(n).removeAttr(n));
            }, this),
            0
          );
      }),
      (n.prototype.toggle = function () {
        var e = !0,
          t = this.$element.closest('[data-toggle="buttons"]');
        if (t.length) {
          var n = this.$element.find("input");
          "radio" == n.prop("type")
            ? (n.prop("checked") && (e = !1),
              t.find(".active").removeClass("active"),
              this.$element.addClass("active"))
            : "checkbox" == n.prop("type") &&
              (n.prop("checked") !== this.$element.hasClass("active") &&
                (e = !1),
              this.$element.toggleClass("active")),
            n.prop("checked", this.$element.hasClass("active")),
            e && n.trigger("change");
        } else
          this.$element.attr("aria-pressed", !this.$element.hasClass("active")),
            this.$element.toggleClass("active");
      });
    var i = e.fn.button;
    (e.fn.button = t),
      (e.fn.button.Constructor = n),
      (e.fn.button.noConflict = function () {
        return (e.fn.button = i), this;
      }),
      e(document)
        .on(
          "click.bs.button.data-api",
          '[data-toggle^="button"]',
          function (n) {
            var i = e(n.target);
            i.hasClass("btn") || (i = i.closest(".btn")),
              t.call(i, "toggle"),
              e(n.target).is('input[type="radio"]') ||
                e(n.target).is('input[type="checkbox"]') ||
                n.preventDefault();
          }
        )
        .on(
          "focus.bs.button.data-api blur.bs.button.data-api",
          '[data-toggle^="button"]',
          function (t) {
            e(t.target)
              .closest(".btn")
              .toggleClass("focus", /^focus(in)?$/.test(t.type));
          }
        );
  })(jQuery),
  (function (e) {
    "use strict";
    function t(t) {
      return this.each(function () {
        var i = e(this),
          o = i.data("bs.carousel"),
          r = e.extend({}, n.DEFAULTS, i.data(), "object" == typeof t && t),
          s = "string" == typeof t ? t : r.slide;
        o || i.data("bs.carousel", (o = new n(this, r))),
          "number" == typeof t
            ? o.to(t)
            : s
            ? o[s]()
            : r.interval && o.pause().cycle();
      });
    }
    var n = function (t, n) {
      (this.$element = e(t)),
        (this.$indicators = this.$element.find(".carousel-indicators")),
        (this.options = n),
        (this.paused = null),
        (this.sliding = null),
        (this.interval = null),
        (this.$active = null),
        (this.$items = null),
        this.options.keyboard &&
          this.$element.on("keydown.bs.carousel", e.proxy(this.keydown, this)),
        "hover" == this.options.pause &&
          !("ontouchstart" in document.documentElement) &&
          this.$element
            .on("mouseenter.bs.carousel", e.proxy(this.pause, this))
            .on("mouseleave.bs.carousel", e.proxy(this.cycle, this));
    };
    (n.VERSION = "3.3.6"),
      (n.TRANSITION_DURATION = 600),
      (n.DEFAULTS = { interval: 5e3, pause: "hover", wrap: !0, keyboard: !0 }),
      (n.prototype.keydown = function (e) {
        if (!/input|textarea/i.test(e.target.tagName)) {
          switch (e.which) {
            case 37:
              this.prev();
              break;
            case 39:
              this.next();
              break;
            default:
              return;
          }
          e.preventDefault();
        }
      }),
      (n.prototype.cycle = function (t) {
        return (
          t || (this.paused = !1),
          this.interval && clearInterval(this.interval),
          this.options.interval &&
            !this.paused &&
            (this.interval = setInterval(
              e.proxy(this.next, this),
              this.options.interval
            )),
          this
        );
      }),
      (n.prototype.getItemIndex = function (e) {
        return (
          (this.$items = e.parent().children(".item")),
          this.$items.index(e || this.$active)
        );
      }),
      (n.prototype.getItemForDirection = function (e, t) {
        var n = this.getItemIndex(t);
        if (
          (("prev" == e && 0 === n) ||
            ("next" == e && n == this.$items.length - 1)) &&
          !this.options.wrap
        )
          return t;
        var i = (n + ("prev" == e ? -1 : 1)) % this.$items.length;
        return this.$items.eq(i);
      }),
      (n.prototype.to = function (e) {
        var t = this,
          n = this.getItemIndex(
            (this.$active = this.$element.find(".item.active"))
          );
        return e > this.$items.length - 1 || 0 > e
          ? void 0
          : this.sliding
          ? this.$element.one("slid.bs.carousel", function () {
              t.to(e);
            })
          : n == e
          ? this.pause().cycle()
          : this.slide(e > n ? "next" : "prev", this.$items.eq(e));
      }),
      (n.prototype.pause = function (t) {
        return (
          t || (this.paused = !0),
          this.$element.find(".next, .prev").length &&
            e.support.transition &&
            (this.$element.trigger(e.support.transition.end), this.cycle(!0)),
          (this.interval = clearInterval(this.interval)),
          this
        );
      }),
      (n.prototype.next = function () {
        return this.sliding ? void 0 : this.slide("next");
      }),
      (n.prototype.prev = function () {
        return this.sliding ? void 0 : this.slide("prev");
      }),
      (n.prototype.slide = function (t, i) {
        var o = this.$element.find(".item.active"),
          r = i || this.getItemForDirection(t, o),
          s = this.interval,
          a = "next" == t ? "left" : "right",
          l = this;
        if (r.hasClass("active")) return (this.sliding = !1);
        var c = r[0],
          u = e.Event("slide.bs.carousel", { relatedTarget: c, direction: a });
        if ((this.$element.trigger(u), !u.isDefaultPrevented())) {
          if (
            ((this.sliding = !0), s && this.pause(), this.$indicators.length)
          ) {
            this.$indicators.find(".active").removeClass("active");
            var d = e(this.$indicators.children()[this.getItemIndex(r)]);
            d && d.addClass("active");
          }
          var p = e.Event("slid.bs.carousel", {
            relatedTarget: c,
            direction: a,
          });
          return (
            e.support.transition && this.$element.hasClass("slide")
              ? (r.addClass(t),
                r[0].offsetWidth,
                o.addClass(a),
                r.addClass(a),
                o
                  .one("bsTransitionEnd", function () {
                    r.removeClass([t, a].join(" ")).addClass("active"),
                      o.removeClass(["active", a].join(" ")),
                      (l.sliding = !1),
                      setTimeout(function () {
                        l.$element.trigger(p);
                      }, 0);
                  })
                  .emulateTransitionEnd(n.TRANSITION_DURATION))
              : (o.removeClass("active"),
                r.addClass("active"),
                (this.sliding = !1),
                this.$element.trigger(p)),
            s && this.cycle(),
            this
          );
        }
      });
    var i = e.fn.carousel;
    (e.fn.carousel = t),
      (e.fn.carousel.Constructor = n),
      (e.fn.carousel.noConflict = function () {
        return (e.fn.carousel = i), this;
      });
    var o = function (n) {
      var i,
        o = e(this),
        r = e(
          o.attr("data-target") ||
            ((i = o.attr("href")) && i.replace(/.*(?=#[^\s]+$)/, ""))
        );
      if (r.hasClass("carousel")) {
        var s = e.extend({}, r.data(), o.data()),
          a = o.attr("data-slide-to");
        a && (s.interval = !1),
          t.call(r, s),
          a && r.data("bs.carousel").to(a),
          n.preventDefault();
      }
    };
    e(document)
      .on("click.bs.carousel.data-api", "[data-slide]", o)
      .on("click.bs.carousel.data-api", "[data-slide-to]", o),
      e(window).on("load", function () {
        e('[data-ride="carousel"]').each(function () {
          var n = e(this);
          t.call(n, n.data());
        });
      });
  })(jQuery),
  (function (e) {
    "use strict";
    function t(t) {
      var n,
        i =
          t.attr("data-target") ||
          ((n = t.attr("href")) && n.replace(/.*(?=#[^\s]+$)/, ""));
      return e(i);
    }
    function n(t) {
      return this.each(function () {
        var n = e(this),
          o = n.data("bs.collapse"),
          r = e.extend({}, i.DEFAULTS, n.data(), "object" == typeof t && t);
        !o && r.toggle && /show|hide/.test(t) && (r.toggle = !1),
          o || n.data("bs.collapse", (o = new i(this, r))),
          "string" == typeof t && o[t]();
      });
    }
    var i = function (t, n) {
      (this.$element = e(t)),
        (this.options = e.extend({}, i.DEFAULTS, n)),
        (this.$trigger = e(
          '[data-toggle="collapse"][href="#' +
            t.id +
            '"],[data-toggle="collapse"][data-target="#' +
            t.id +
            '"]'
        )),
        (this.transitioning = null),
        this.options.parent
          ? (this.$parent = this.getParent())
          : this.addAriaAndCollapsedClass(this.$element, this.$trigger),
        this.options.toggle && this.toggle();
    };
    (i.VERSION = "3.3.6"),
      (i.TRANSITION_DURATION = 350),
      (i.DEFAULTS = { toggle: !0 }),
      (i.prototype.dimension = function () {
        return this.$element.hasClass("width") ? "width" : "height";
      }),
      (i.prototype.show = function () {
        if (!this.transitioning && !this.$element.hasClass("in")) {
          var t,
            o =
              this.$parent &&
              this.$parent.children(".panel").children(".in, .collapsing");
          if (
            !(
              o &&
              o.length &&
              ((t = o.data("bs.collapse")), t && t.transitioning)
            )
          ) {
            var r = e.Event("show.bs.collapse");
            if ((this.$element.trigger(r), !r.isDefaultPrevented())) {
              o &&
                o.length &&
                (n.call(o, "hide"), t || o.data("bs.collapse", null));
              var s = this.dimension();
              this.$element
                .removeClass("collapse")
                .addClass("collapsing")
                [s](0)
                .attr("aria-expanded", !0),
                this.$trigger
                  .removeClass("collapsed")
                  .attr("aria-expanded", !0),
                (this.transitioning = 1);
              var a = function () {
                this.$element
                  .removeClass("collapsing")
                  .addClass("collapse in")
                  [s](""),
                  (this.transitioning = 0),
                  this.$element.trigger("shown.bs.collapse");
              };
              if (!e.support.transition) return a.call(this);
              var l = e.camelCase(["scroll", s].join("-"));
              this.$element
                .one("bsTransitionEnd", e.proxy(a, this))
                .emulateTransitionEnd(i.TRANSITION_DURATION)
                [s](this.$element[0][l]);
            }
          }
        }
      }),
      (i.prototype.hide = function () {
        if (!this.transitioning && this.$element.hasClass("in")) {
          var t = e.Event("hide.bs.collapse");
          if ((this.$element.trigger(t), !t.isDefaultPrevented())) {
            var n = this.dimension();
            this.$element[n](this.$element[n]())[0].offsetHeight,
              this.$element
                .addClass("collapsing")
                .removeClass("collapse in")
                .attr("aria-expanded", !1),
              this.$trigger.addClass("collapsed").attr("aria-expanded", !1),
              (this.transitioning = 1);
            var o = function () {
              (this.transitioning = 0),
                this.$element
                  .removeClass("collapsing")
                  .addClass("collapse")
                  .trigger("hidden.bs.collapse");
            };
            return e.support.transition
              ? void this.$element[n](0)
                  .one("bsTransitionEnd", e.proxy(o, this))
                  .emulateTransitionEnd(i.TRANSITION_DURATION)
              : o.call(this);
          }
        }
      }),
      (i.prototype.toggle = function () {
        this[this.$element.hasClass("in") ? "hide" : "show"]();
      }),
      (i.prototype.getParent = function () {
        return e(this.options.parent)
          .find(
            '[data-toggle="collapse"][data-parent="' +
              this.options.parent +
              '"]'
          )
          .each(
            e.proxy(function (n, i) {
              var o = e(i);
              this.addAriaAndCollapsedClass(t(o), o);
            }, this)
          )
          .end();
      }),
      (i.prototype.addAriaAndCollapsedClass = function (e, t) {
        var n = e.hasClass("in");
        e.attr("aria-expanded", n),
          t.toggleClass("collapsed", !n).attr("aria-expanded", n);
      });
    var o = e.fn.collapse;
    (e.fn.collapse = n),
      (e.fn.collapse.Constructor = i),
      (e.fn.collapse.noConflict = function () {
        return (e.fn.collapse = o), this;
      }),
      e(document).on(
        "click.bs.collapse.data-api",
        '[data-toggle="collapse"]',
        function (i) {
          var o = e(this);
          o.attr("data-target") || i.preventDefault();
          var r = t(o),
            s = r.data("bs.collapse") ? "toggle" : o.data();
          n.call(r, s);
        }
      );
  })(jQuery),
  (function (e) {
    "use strict";
    function t(t) {
      var n = t.attr("data-target");
      n ||
        (n =
          (n = t.attr("href")) &&
          /#[A-Za-z]/.test(n) &&
          n.replace(/.*(?=#[^\s]*$)/, ""));
      var i = n && e(n);
      return i && i.length ? i : t.parent();
    }
    function n(n) {
      (n && 3 === n.which) ||
        (e(i).remove(),
        e(o).each(function () {
          var i = e(this),
            o = t(i),
            r = { relatedTarget: this };
          o.hasClass("open") &&
            ((n &&
              "click" == n.type &&
              /input|textarea/i.test(n.target.tagName) &&
              e.contains(o[0], n.target)) ||
              (o.trigger((n = e.Event("hide.bs.dropdown", r))),
              n.isDefaultPrevented() ||
                (i.attr("aria-expanded", "false"),
                o
                  .removeClass("open")
                  .trigger(e.Event("hidden.bs.dropdown", r)))));
        }));
    }
    var i = ".dropdown-backdrop",
      o = '[data-toggle="dropdown"]',
      r = function (t) {
        e(t).on("click.bs.dropdown", this.toggle);
      };
    (r.VERSION = "3.3.6"),
      (r.prototype.toggle = function (i) {
        var o = e(this);
        if (!o.is(".disabled, :disabled")) {
          var r = t(o),
            s = r.hasClass("open");
          if ((n(), !s)) {
            "ontouchstart" in document.documentElement &&
              !r.closest(".navbar-nav").length &&
              e(document.createElement("div"))
                .addClass("dropdown-backdrop")
                .insertAfter(e(this))
                .on("click", n);
            var a = { relatedTarget: this };
            if (
              (r.trigger((i = e.Event("show.bs.dropdown", a))),
              i.isDefaultPrevented())
            )
              return;
            o.trigger("focus").attr("aria-expanded", "true"),
              r.toggleClass("open").trigger(e.Event("shown.bs.dropdown", a));
          }
          return !1;
        }
      }),
      (r.prototype.keydown = function (n) {
        if (
          /(38|40|27|32)/.test(n.which) &&
          !/input|textarea/i.test(n.target.tagName)
        ) {
          var i = e(this);
          if (
            (n.preventDefault(),
            n.stopPropagation(),
            !i.is(".disabled, :disabled"))
          ) {
            var r = t(i),
              s = r.hasClass("open");
            if ((!s && 27 != n.which) || (s && 27 == n.which))
              return (
                27 == n.which && r.find(o).trigger("focus"), i.trigger("click")
              );
            var a = r.find(".dropdown-menu li:not(.disabled):visible a");
            if (a.length) {
              var l = a.index(n.target);
              38 == n.which && l > 0 && l--,
                40 == n.which && l < a.length - 1 && l++,
                ~l || (l = 0),
                a.eq(l).trigger("focus");
            }
          }
        }
      });
    var s = e.fn.dropdown;
    (e.fn.dropdown = function (t) {
      return this.each(function () {
        var n = e(this),
          i = n.data("bs.dropdown");
        i || n.data("bs.dropdown", (i = new r(this))),
          "string" == typeof t && i[t].call(n);
      });
    }),
      (e.fn.dropdown.Constructor = r),
      (e.fn.dropdown.noConflict = function () {
        return (e.fn.dropdown = s), this;
      }),
      e(document)
        .on("click.bs.dropdown.data-api", n)
        .on("click.bs.dropdown.data-api", ".dropdown form", function (e) {
          e.stopPropagation();
        })
        .on("click.bs.dropdown.data-api", o, r.prototype.toggle)
        .on("keydown.bs.dropdown.data-api", o, r.prototype.keydown)
        .on(
          "keydown.bs.dropdown.data-api",
          ".dropdown-menu",
          r.prototype.keydown
        );
  })(jQuery),
  (function (e) {
    "use strict";
    function t(t, i) {
      return this.each(function () {
        var o = e(this),
          r = o.data("bs.modal"),
          s = e.extend({}, n.DEFAULTS, o.data(), "object" == typeof t && t);
        r || o.data("bs.modal", (r = new n(this, s))),
          "string" == typeof t ? r[t](i) : s.show && r.show(i);
      });
    }
    var n = function (t, n) {
      (this.options = n),
        (this.$body = e(document.body)),
        (this.$element = e(t)),
        (this.$dialog = this.$element.find(".modal-dialog")),
        (this.$backdrop = null),
        (this.isShown = null),
        (this.originalBodyPad = null),
        (this.scrollbarWidth = 0),
        (this.ignoreBackdropClick = !1),
        this.options.remote &&
          this.$element.find(".modal-content").load(
            this.options.remote,
            e.proxy(function () {
              this.$element.trigger("loaded.bs.modal");
            }, this)
          );
    };
    (n.VERSION = "3.3.6"),
      (n.TRANSITION_DURATION = 300),
      (n.BACKDROP_TRANSITION_DURATION = 150),
      (n.DEFAULTS = { backdrop: !0, keyboard: !0, show: !0 }),
      (n.prototype.toggle = function (e) {
        return this.isShown ? this.hide() : this.show(e);
      }),
      (n.prototype.show = function (t) {
        var i = this,
          o = e.Event("show.bs.modal", { relatedTarget: t });
        this.$element.trigger(o),
          this.isShown ||
            o.isDefaultPrevented() ||
            ((this.isShown = !0),
            this.checkScrollbar(),
            this.setScrollbar(),
            this.$body.addClass("modal-open"),
            this.escape(),
            this.resize(),
            this.$element.on(
              "click.dismiss.bs.modal",
              '[data-dismiss="modal"]',
              e.proxy(this.hide, this)
            ),
            this.$dialog.on("mousedown.dismiss.bs.modal", function () {
              i.$element.one("mouseup.dismiss.bs.modal", function (t) {
                e(t.target).is(i.$element) && (i.ignoreBackdropClick = !0);
              });
            }),
            this.backdrop(function () {
              var o = e.support.transition && i.$element.hasClass("fade");
              i.$element.parent().length || i.$element.appendTo(i.$body),
                i.$element.show().scrollTop(0),
                i.adjustDialog(),
                o && i.$element[0].offsetWidth,
                i.$element.addClass("in"),
                i.enforceFocus();
              var r = e.Event("shown.bs.modal", { relatedTarget: t });
              o
                ? i.$dialog
                    .one("bsTransitionEnd", function () {
                      i.$element.trigger("focus").trigger(r);
                    })
                    .emulateTransitionEnd(n.TRANSITION_DURATION)
                : i.$element.trigger("focus").trigger(r);
            }));
      }),
      (n.prototype.hide = function (t) {
        t && t.preventDefault(),
          (t = e.Event("hide.bs.modal")),
          this.$element.trigger(t),
          this.isShown &&
            !t.isDefaultPrevented() &&
            ((this.isShown = !1),
            this.escape(),
            this.resize(),
            e(document).off("focusin.bs.modal"),
            this.$element
              .removeClass("in")
              .off("click.dismiss.bs.modal")
              .off("mouseup.dismiss.bs.modal"),
            this.$dialog.off("mousedown.dismiss.bs.modal"),
            e.support.transition && this.$element.hasClass("fade")
              ? this.$element
                  .one("bsTransitionEnd", e.proxy(this.hideModal, this))
                  .emulateTransitionEnd(n.TRANSITION_DURATION)
              : this.hideModal());
      }),
      (n.prototype.enforceFocus = function () {
        e(document)
          .off("focusin.bs.modal")
          .on(
            "focusin.bs.modal",
            e.proxy(function (e) {
              this.$element[0] === e.target ||
                this.$element.has(e.target).length ||
                this.$element.trigger("focus");
            }, this)
          );
      }),
      (n.prototype.escape = function () {
        this.isShown && this.options.keyboard
          ? this.$element.on(
              "keydown.dismiss.bs.modal",
              e.proxy(function (e) {
                27 == e.which && this.hide();
              }, this)
            )
          : this.isShown || this.$element.off("keydown.dismiss.bs.modal");
      }),
      (n.prototype.resize = function () {
        this.isShown
          ? e(window).on("resize.bs.modal", e.proxy(this.handleUpdate, this))
          : e(window).off("resize.bs.modal");
      }),
      (n.prototype.hideModal = function () {
        var e = this;
        this.$element.hide(),
          this.backdrop(function () {
            e.$body.removeClass("modal-open"),
              e.resetAdjustments(),
              e.resetScrollbar(),
              e.$element.trigger("hidden.bs.modal");
          });
      }),
      (n.prototype.removeBackdrop = function () {
        this.$backdrop && this.$backdrop.remove(), (this.$backdrop = null);
      }),
      (n.prototype.backdrop = function (t) {
        var i = this,
          o = this.$element.hasClass("fade") ? "fade" : "";
        if (this.isShown && this.options.backdrop) {
          var r = e.support.transition && o;
          if (
            ((this.$backdrop = e(document.createElement("div"))
              .addClass("modal-backdrop " + o)
              .appendTo(this.$body)),
            this.$element.on(
              "click.dismiss.bs.modal",
              e.proxy(function (e) {
                return this.ignoreBackdropClick
                  ? void (this.ignoreBackdropClick = !1)
                  : void (
                      e.target === e.currentTarget &&
                      ("static" == this.options.backdrop
                        ? this.$element[0].focus()
                        : this.hide())
                    );
              }, this)
            ),
            r && this.$backdrop[0].offsetWidth,
            this.$backdrop.addClass("in"),
            !t)
          )
            return;
          r
            ? this.$backdrop
                .one("bsTransitionEnd", t)
                .emulateTransitionEnd(n.BACKDROP_TRANSITION_DURATION)
            : t();
        } else if (!this.isShown && this.$backdrop) {
          this.$backdrop.removeClass("in");
          var s = function () {
            i.removeBackdrop(), t && t();
          };
          e.support.transition && this.$element.hasClass("fade")
            ? this.$backdrop
                .one("bsTransitionEnd", s)
                .emulateTransitionEnd(n.BACKDROP_TRANSITION_DURATION)
            : s();
        } else t && t();
      }),
      (n.prototype.handleUpdate = function () {
        this.adjustDialog();
      }),
      (n.prototype.adjustDialog = function () {
        var e =
          this.$element[0].scrollHeight > document.documentElement.clientHeight;
        this.$element.css({
          paddingLeft: !this.bodyIsOverflowing && e ? this.scrollbarWidth : "",
          paddingRight: this.bodyIsOverflowing && !e ? this.scrollbarWidth : "",
        });
      }),
      (n.prototype.resetAdjustments = function () {
        this.$element.css({ paddingLeft: "", paddingRight: "" });
      }),
      (n.prototype.checkScrollbar = function () {
        var e = window.innerWidth;
        if (!e) {
          var t = document.documentElement.getBoundingClientRect();
          e = t.right - Math.abs(t.left);
        }
        (this.bodyIsOverflowing = document.body.clientWidth < e),
          (this.scrollbarWidth = this.measureScrollbar());
      }),
      (n.prototype.setScrollbar = function () {
        var e = parseInt(this.$body.css("padding-right") || 0, 10);
        (this.originalBodyPad = document.body.style.paddingRight || ""),
          this.bodyIsOverflowing &&
            this.$body.css("padding-right", e + this.scrollbarWidth);
      }),
      (n.prototype.resetScrollbar = function () {
        this.$body.css("padding-right", this.originalBodyPad);
      }),
      (n.prototype.measureScrollbar = function () {
        var e = document.createElement("div");
        (e.className = "modal-scrollbar-measure"), this.$body.append(e);
        var t = e.offsetWidth - e.clientWidth;
        return this.$body[0].removeChild(e), t;
      });
    var i = e.fn.modal;
    (e.fn.modal = t),
      (e.fn.modal.Constructor = n),
      (e.fn.modal.noConflict = function () {
        return (e.fn.modal = i), this;
      }),
      e(document).on(
        "click.bs.modal.data-api",
        '[data-toggle="modal"]',
        function (n) {
          var i = e(this),
            o = i.attr("href"),
            r = e(
              i.attr("data-target") || (o && o.replace(/.*(?=#[^\s]+$)/, ""))
            ),
            s = r.data("bs.modal")
              ? "toggle"
              : e.extend({ remote: !/#/.test(o) && o }, r.data(), i.data());
          i.is("a") && n.preventDefault(),
            r.one("show.bs.modal", function (e) {
              e.isDefaultPrevented() ||
                r.one("hidden.bs.modal", function () {
                  i.is(":visible") && i.trigger("focus");
                });
            }),
            t.call(r, s, this);
        }
      );
  })(jQuery),
  (function (e) {
    "use strict";
    var t = function (e, t) {
      (this.type = null),
        (this.options = null),
        (this.enabled = null),
        (this.timeout = null),
        (this.hoverState = null),
        (this.$element = null),
        (this.inState = null),
        this.init("tooltip", e, t);
    };
    (t.VERSION = "3.3.6"),
      (t.TRANSITION_DURATION = 150),
      (t.DEFAULTS = {
        animation: !0,
        placement: "top",
        selector: !1,
        template:
          '<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>',
        trigger: "hover focus",
        title: "",
        delay: 0,
        html: !1,
        container: !1,
        viewport: { selector: "body", padding: 0 },
      }),
      (t.prototype.init = function (t, n, i) {
        if (
          ((this.enabled = !0),
          (this.type = t),
          (this.$element = e(n)),
          (this.options = this.getOptions(i)),
          (this.$viewport =
            this.options.viewport &&
            e(
              e.isFunction(this.options.viewport)
                ? this.options.viewport.call(this, this.$element)
                : this.options.viewport.selector || this.options.viewport
            )),
          (this.inState = { click: !1, hover: !1, focus: !1 }),
          this.$element[0] instanceof document.constructor &&
            !this.options.selector)
        )
          throw new Error(
            "`selector` option must be specified when initializing " +
              this.type +
              " on the window.document object!"
          );
        for (var o = this.options.trigger.split(" "), r = o.length; r--; ) {
          var s = o[r];
          if ("click" == s)
            this.$element.on(
              "click." + this.type,
              this.options.selector,
              e.proxy(this.toggle, this)
            );
          else if ("manual" != s) {
            var a = "hover" == s ? "mouseenter" : "focusin",
              l = "hover" == s ? "mouseleave" : "focusout";
            this.$element.on(
              a + "." + this.type,
              this.options.selector,
              e.proxy(this.enter, this)
            ),
              this.$element.on(
                l + "." + this.type,
                this.options.selector,
                e.proxy(this.leave, this)
              );
          }
        }
        this.options.selector
          ? (this._options = e.extend({}, this.options, {
              trigger: "manual",
              selector: "",
            }))
          : this.fixTitle();
      }),
      (t.prototype.getDefaults = function () {
        return t.DEFAULTS;
      }),
      (t.prototype.getOptions = function (t) {
        return (
          (t = e.extend({}, this.getDefaults(), this.$element.data(), t))
            .delay &&
            "number" == typeof t.delay &&
            (t.delay = { show: t.delay, hide: t.delay }),
          t
        );
      }),
      (t.prototype.getDelegateOptions = function () {
        var t = {},
          n = this.getDefaults();
        return (
          this._options &&
            e.each(this._options, function (e, i) {
              n[e] != i && (t[e] = i);
            }),
          t
        );
      }),
      (t.prototype.enter = function (t) {
        var n =
          t instanceof this.constructor
            ? t
            : e(t.currentTarget).data("bs." + this.type);
        return (
          n ||
            ((n = new this.constructor(
              t.currentTarget,
              this.getDelegateOptions()
            )),
            e(t.currentTarget).data("bs." + this.type, n)),
          t instanceof e.Event &&
            (n.inState["focusin" == t.type ? "focus" : "hover"] = !0),
          n.tip().hasClass("in") || "in" == n.hoverState
            ? void (n.hoverState = "in")
            : (clearTimeout(n.timeout),
              (n.hoverState = "in"),
              n.options.delay && n.options.delay.show
                ? void (n.timeout = setTimeout(function () {
                    "in" == n.hoverState && n.show();
                  }, n.options.delay.show))
                : n.show())
        );
      }),
      (t.prototype.isInStateTrue = function () {
        for (var e in this.inState) if (this.inState[e]) return !0;
        return !1;
      }),
      (t.prototype.leave = function (t) {
        var n =
          t instanceof this.constructor
            ? t
            : e(t.currentTarget).data("bs." + this.type);
        return (
          n ||
            ((n = new this.constructor(
              t.currentTarget,
              this.getDelegateOptions()
            )),
            e(t.currentTarget).data("bs." + this.type, n)),
          t instanceof e.Event &&
            (n.inState["focusout" == t.type ? "focus" : "hover"] = !1),
          n.isInStateTrue()
            ? void 0
            : (clearTimeout(n.timeout),
              (n.hoverState = "out"),
              n.options.delay && n.options.delay.hide
                ? void (n.timeout = setTimeout(function () {
                    "out" == n.hoverState && n.hide();
                  }, n.options.delay.hide))
                : n.hide())
        );
      }),
      (t.prototype.show = function () {
        var n = e.Event("show.bs." + this.type);
        if (this.hasContent() && this.enabled) {
          this.$element.trigger(n);
          var i = e.contains(
            this.$element[0].ownerDocument.documentElement,
            this.$element[0]
          );
          if (n.isDefaultPrevented() || !i) return;
          var o = this,
            r = this.tip(),
            s = this.getUID(this.type);
          this.setContent(),
            r.attr("id", s),
            this.$element.attr("aria-describedby", s),
            this.options.animation && r.addClass("fade");
          var a =
              "function" == typeof this.options.placement
                ? this.options.placement.call(this, r[0], this.$element[0])
                : this.options.placement,
            l = /\s?auto?\s?/i,
            c = l.test(a);
          c && (a = a.replace(l, "") || "top"),
            r
              .detach()
              .css({ top: 0, left: 0, display: "block" })
              .addClass(a)
              .data("bs." + this.type, this),
            this.options.container
              ? r.appendTo(this.options.container)
              : r.insertAfter(this.$element),
            this.$element.trigger("inserted.bs." + this.type);
          var u = this.getPosition(),
            d = r[0].offsetWidth,
            p = r[0].offsetHeight;
          if (c) {
            var f = a,
              h = this.getPosition(this.$viewport);
            (a =
              "bottom" == a && u.bottom + p > h.bottom
                ? "top"
                : "top" == a && u.top - p < h.top
                ? "bottom"
                : "right" == a && u.right + d > h.width
                ? "left"
                : "left" == a && u.left - d < h.left
                ? "right"
                : a),
              r.removeClass(f).addClass(a);
          }
          var m = this.getCalculatedOffset(a, u, d, p);
          this.applyPlacement(m, a);
          var g = function () {
            var e = o.hoverState;
            o.$element.trigger("shown.bs." + o.type),
              (o.hoverState = null),
              "out" == e && o.leave(o);
          };
          e.support.transition && this.$tip.hasClass("fade")
            ? r
                .one("bsTransitionEnd", g)
                .emulateTransitionEnd(t.TRANSITION_DURATION)
            : g();
        }
      }),
      (t.prototype.applyPlacement = function (t, n) {
        var i = this.tip(),
          o = i[0].offsetWidth,
          r = i[0].offsetHeight,
          s = parseInt(i.css("margin-top"), 10),
          a = parseInt(i.css("margin-left"), 10);
        isNaN(s) && (s = 0),
          isNaN(a) && (a = 0),
          (t.top += s),
          (t.left += a),
          e.offset.setOffset(
            i[0],
            e.extend(
              {
                using: function (e) {
                  i.css({ top: Math.round(e.top), left: Math.round(e.left) });
                },
              },
              t
            ),
            0
          ),
          i.addClass("in");
        var l = i[0].offsetWidth,
          c = i[0].offsetHeight;
        "top" == n && c != r && (t.top = t.top + r - c);
        var u = this.getViewportAdjustedDelta(n, t, l, c);
        u.left ? (t.left += u.left) : (t.top += u.top);
        var d = /top|bottom/.test(n),
          p = d ? 2 * u.left - o + l : 2 * u.top - r + c,
          f = d ? "offsetWidth" : "offsetHeight";
        i.offset(t), this.replaceArrow(p, i[0][f], d);
      }),
      (t.prototype.replaceArrow = function (e, t, n) {
        this.arrow()
          .css(n ? "left" : "top", 50 * (1 - e / t) + "%")
          .css(n ? "top" : "left", "");
      }),
      (t.prototype.setContent = function () {
        var e = this.tip(),
          t = this.getTitle();
        e.find(".tooltip-inner")[this.options.html ? "html" : "text"](t),
          e.removeClass("fade in top bottom left right");
      }),
      (t.prototype.hide = function (n) {
        function i() {
          "in" != o.hoverState && r.detach(),
            o.$element
              .removeAttr("aria-describedby")
              .trigger("hidden.bs." + o.type),
            n && n();
        }
        var o = this,
          r = e(this.$tip),
          s = e.Event("hide.bs." + this.type);
        return (
          this.$element.trigger(s),
          s.isDefaultPrevented()
            ? void 0
            : (r.removeClass("in"),
              e.support.transition && r.hasClass("fade")
                ? r
                    .one("bsTransitionEnd", i)
                    .emulateTransitionEnd(t.TRANSITION_DURATION)
                : i(),
              (this.hoverState = null),
              this)
        );
      }),
      (t.prototype.fixTitle = function () {
        var e = this.$element;
        (e.attr("title") || "string" != typeof e.attr("data-original-title")) &&
          e
            .attr("data-original-title", e.attr("title") || "")
            .attr("title", "");
      }),
      (t.prototype.hasContent = function () {
        return this.getTitle();
      }),
      (t.prototype.getPosition = function (t) {
        var n = (t = t || this.$element)[0],
          i = "BODY" == n.tagName,
          o = n.getBoundingClientRect();
        null == o.width &&
          (o = e.extend({}, o, {
            width: o.right - o.left,
            height: o.bottom - o.top,
          }));
        var r = i ? { top: 0, left: 0 } : t.offset(),
          s = {
            scroll: i
              ? document.documentElement.scrollTop || document.body.scrollTop
              : t.scrollTop(),
          },
          a = i
            ? { width: e(window).width(), height: e(window).height() }
            : null;
        return e.extend({}, o, s, a, r);
      }),
      (t.prototype.getCalculatedOffset = function (e, t, n, i) {
        return "bottom" == e
          ? { top: t.top + t.height, left: t.left + t.width / 2 - n / 2 }
          : "top" == e
          ? { top: t.top - i, left: t.left + t.width / 2 - n / 2 }
          : "left" == e
          ? { top: t.top + t.height / 2 - i / 2, left: t.left - n }
          : { top: t.top + t.height / 2 - i / 2, left: t.left + t.width };
      }),
      (t.prototype.getViewportAdjustedDelta = function (e, t, n, i) {
        var o = { top: 0, left: 0 };
        if (!this.$viewport) return o;
        var r = (this.options.viewport && this.options.viewport.padding) || 0,
          s = this.getPosition(this.$viewport);
        if (/right|left/.test(e)) {
          var a = t.top - r - s.scroll,
            l = t.top + r - s.scroll + i;
          a < s.top
            ? (o.top = s.top - a)
            : l > s.top + s.height && (o.top = s.top + s.height - l);
        } else {
          var c = t.left - r,
            u = t.left + r + n;
          c < s.left
            ? (o.left = s.left - c)
            : u > s.right && (o.left = s.left + s.width - u);
        }
        return o;
      }),
      (t.prototype.getTitle = function () {
        var e = this.$element,
          t = this.options;
        return (
          e.attr("data-original-title") ||
          ("function" == typeof t.title ? t.title.call(e[0]) : t.title)
        );
      }),
      (t.prototype.getUID = function (e) {
        do {
          e += ~~(1e6 * Math.random());
        } while (document.getElementById(e));
        return e;
      }),
      (t.prototype.tip = function () {
        if (
          !this.$tip &&
          ((this.$tip = e(this.options.template)), 1 != this.$tip.length)
        )
          throw new Error(
            this.type +
              " `template` option must consist of exactly 1 top-level element!"
          );
        return this.$tip;
      }),
      (t.prototype.arrow = function () {
        return (this.$arrow = this.$arrow || this.tip().find(".tooltip-arrow"));
      }),
      (t.prototype.enable = function () {
        this.enabled = !0;
      }),
      (t.prototype.disable = function () {
        this.enabled = !1;
      }),
      (t.prototype.toggleEnabled = function () {
        this.enabled = !this.enabled;
      }),
      (t.prototype.toggle = function (t) {
        var n = this;
        t &&
          ((n = e(t.currentTarget).data("bs." + this.type)) ||
            ((n = new this.constructor(
              t.currentTarget,
              this.getDelegateOptions()
            )),
            e(t.currentTarget).data("bs." + this.type, n))),
          t
            ? ((n.inState.click = !n.inState.click),
              n.isInStateTrue() ? n.enter(n) : n.leave(n))
            : n.tip().hasClass("in")
            ? n.leave(n)
            : n.enter(n);
      }),
      (t.prototype.destroy = function () {
        var e = this;
        clearTimeout(this.timeout),
          this.hide(function () {
            e.$element.off("." + e.type).removeData("bs." + e.type),
              e.$tip && e.$tip.detach(),
              (e.$tip = null),
              (e.$arrow = null),
              (e.$viewport = null);
          });
      });
    var n = e.fn.tooltip;
    (e.fn.tooltip = function (n) {
      return this.each(function () {
        var i = e(this),
          o = i.data("bs.tooltip"),
          r = "object" == typeof n && n;
        (o || !/destroy|hide/.test(n)) &&
          (o || i.data("bs.tooltip", (o = new t(this, r))),
          "string" == typeof n && o[n]());
      });
    }),
      (e.fn.tooltip.Constructor = t),
      (e.fn.tooltip.noConflict = function () {
        return (e.fn.tooltip = n), this;
      });
  })(jQuery),
  (function (e) {
    "use strict";
    var t = function (e, t) {
      this.init("popover", e, t);
    };
    if (!e.fn.tooltip) throw new Error("Popover requires tooltip.js");
    (t.VERSION = "3.3.6"),
      (t.DEFAULTS = e.extend({}, e.fn.tooltip.Constructor.DEFAULTS, {
        placement: "right",
        trigger: "click",
        content: "",
        template:
          '<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>',
      })),
      ((t.prototype = e.extend(
        {},
        e.fn.tooltip.Constructor.prototype
      )).constructor = t),
      (t.prototype.getDefaults = function () {
        return t.DEFAULTS;
      }),
      (t.prototype.setContent = function () {
        var e = this.tip(),
          t = this.getTitle(),
          n = this.getContent();
        e.find(".popover-title")[this.options.html ? "html" : "text"](t),
          e
            .find(".popover-content")
            .children()
            .detach()
            .end()
            [
              this.options.html
                ? "string" == typeof n
                  ? "html"
                  : "append"
                : "text"
            ](n),
          e.removeClass("fade top bottom left right in"),
          e.find(".popover-title").html() || e.find(".popover-title").hide();
      }),
      (t.prototype.hasContent = function () {
        return this.getTitle() || this.getContent();
      }),
      (t.prototype.getContent = function () {
        var e = this.$element,
          t = this.options;
        return (
          e.attr("data-content") ||
          ("function" == typeof t.content ? t.content.call(e[0]) : t.content)
        );
      }),
      (t.prototype.arrow = function () {
        return (this.$arrow = this.$arrow || this.tip().find(".arrow"));
      });
    var n = e.fn.popover;
    (e.fn.popover = function (n) {
      return this.each(function () {
        var i = e(this),
          o = i.data("bs.popover"),
          r = "object" == typeof n && n;
        (o || !/destroy|hide/.test(n)) &&
          (o || i.data("bs.popover", (o = new t(this, r))),
          "string" == typeof n && o[n]());
      });
    }),
      (e.fn.popover.Constructor = t),
      (e.fn.popover.noConflict = function () {
        return (e.fn.popover = n), this;
      });
  })(jQuery),
  (function (e) {
    "use strict";
    function t(n, i) {
      (this.$body = e(document.body)),
        (this.$scrollElement = e(e(n).is(document.body) ? window : n)),
        (this.options = e.extend({}, t.DEFAULTS, i)),
        (this.selector = (this.options.target || "") + " .nav li > a"),
        (this.offsets = []),
        (this.targets = []),
        (this.activeTarget = null),
        (this.scrollHeight = 0),
        this.$scrollElement.on(
          "scroll.bs.scrollspy",
          e.proxy(this.process, this)
        ),
        this.refresh(),
        this.process();
    }
    function n(n) {
      return this.each(function () {
        var i = e(this),
          o = i.data("bs.scrollspy"),
          r = "object" == typeof n && n;
        o || i.data("bs.scrollspy", (o = new t(this, r))),
          "string" == typeof n && o[n]();
      });
    }
    (t.VERSION = "3.3.6"),
      (t.DEFAULTS = { offset: 10 }),
      (t.prototype.getScrollHeight = function () {
        return (
          this.$scrollElement[0].scrollHeight ||
          Math.max(
            this.$body[0].scrollHeight,
            document.documentElement.scrollHeight
          )
        );
      }),
      (t.prototype.refresh = function () {
        var t = this,
          n = "offset",
          i = 0;
        (this.offsets = []),
          (this.targets = []),
          (this.scrollHeight = this.getScrollHeight()),
          e.isWindow(this.$scrollElement[0]) ||
            ((n = "position"), (i = this.$scrollElement.scrollTop())),
          this.$body
            .find(this.selector)
            .map(function () {
              var t = e(this),
                o = t.data("target") || t.attr("href"),
                r = /^#./.test(o) && e(o);
              return (
                (r && r.length && r.is(":visible") && [[r[n]().top + i, o]]) ||
                null
              );
            })
            .sort(function (e, t) {
              return e[0] - t[0];
            })
            .each(function () {
              t.offsets.push(this[0]), t.targets.push(this[1]);
            });
      }),
      (t.prototype.process = function () {
        var e,
          t = this.$scrollElement.scrollTop() + this.options.offset,
          n = this.getScrollHeight(),
          i = this.options.offset + n - this.$scrollElement.height(),
          o = this.offsets,
          r = this.targets,
          s = this.activeTarget;
        if ((this.scrollHeight != n && this.refresh(), t >= i))
          return s != (e = r[r.length - 1]) && this.activate(e);
        if (s && t < o[0]) return (this.activeTarget = null), this.clear();
        for (e = o.length; e--; )
          s != r[e] &&
            t >= o[e] &&
            (void 0 === o[e + 1] || t < o[e + 1]) &&
            this.activate(r[e]);
      }),
      (t.prototype.activate = function (t) {
        (this.activeTarget = t), this.clear();
        var n =
            this.selector +
            '[data-target="' +
            t +
            '"],' +
            this.selector +
            '[href="' +
            t +
            '"]',
          i = e(n).parents("li").addClass("active");
        i.parent(".dropdown-menu").length &&
          (i = i.closest("li.dropdown").addClass("active")),
          i.trigger("activate.bs.scrollspy");
      }),
      (t.prototype.clear = function () {
        e(this.selector)
          .parentsUntil(this.options.target, ".active")
          .removeClass("active");
      });
    var i = e.fn.scrollspy;
    (e.fn.scrollspy = n),
      (e.fn.scrollspy.Constructor = t),
      (e.fn.scrollspy.noConflict = function () {
        return (e.fn.scrollspy = i), this;
      }),
      e(window).on("load.bs.scrollspy.data-api", function () {
        e('[data-spy="scroll"]').each(function () {
          var t = e(this);
          n.call(t, t.data());
        });
      });
  })(jQuery),
  (function (e) {
    "use strict";
    function t(t) {
      return this.each(function () {
        var i = e(this),
          o = i.data("bs.tab");
        o || i.data("bs.tab", (o = new n(this))),
          "string" == typeof t && o[t]();
      });
    }
    var n = function (t) {
      this.element = e(t);
    };
    (n.VERSION = "3.3.6"),
      (n.TRANSITION_DURATION = 150),
      (n.prototype.show = function () {
        var t = this.element,
          n = t.closest("ul:not(.dropdown-menu)"),
          i = t.data("target");
        if (
          (i || (i = (i = t.attr("href")) && i.replace(/.*(?=#[^\s]*$)/, "")),
          !t.parent("li").hasClass("active"))
        ) {
          var o = n.find(".active:last a"),
            r = e.Event("hide.bs.tab", { relatedTarget: t[0] }),
            s = e.Event("show.bs.tab", { relatedTarget: o[0] });
          if (
            (o.trigger(r),
            t.trigger(s),
            !s.isDefaultPrevented() && !r.isDefaultPrevented())
          ) {
            var a = e(i);
            this.activate(t.closest("li"), n),
              this.activate(a, a.parent(), function () {
                o.trigger({ type: "hidden.bs.tab", relatedTarget: t[0] }),
                  t.trigger({ type: "shown.bs.tab", relatedTarget: o[0] });
              });
          }
        }
      }),
      (n.prototype.activate = function (t, i, o) {
        function r() {
          s
            .removeClass("active")
            .find("> .dropdown-menu > .active")
            .removeClass("active")
            .end()
            .find('[data-toggle="tab"]')
            .attr("aria-expanded", !1),
            t
              .addClass("active")
              .find('[data-toggle="tab"]')
              .attr("aria-expanded", !0),
            a ? (t[0].offsetWidth, t.addClass("in")) : t.removeClass("fade"),
            t.parent(".dropdown-menu").length &&
              t
                .closest("li.dropdown")
                .addClass("active")
                .end()
                .find('[data-toggle="tab"]')
                .attr("aria-expanded", !0),
            o && o();
        }
        var s = i.find("> .active"),
          a =
            o &&
            e.support.transition &&
            ((s.length && s.hasClass("fade")) || !!i.find("> .fade").length);
        s.length && a
          ? s
              .one("bsTransitionEnd", r)
              .emulateTransitionEnd(n.TRANSITION_DURATION)
          : r(),
          s.removeClass("in");
      });
    var i = e.fn.tab;
    (e.fn.tab = t),
      (e.fn.tab.Constructor = n),
      (e.fn.tab.noConflict = function () {
        return (e.fn.tab = i), this;
      });
    var o = function (n) {
      n.preventDefault(), t.call(e(this), "show");
    };
    e(document)
      .on("click.bs.tab.data-api", '[data-toggle="tab"]', o)
      .on("click.bs.tab.data-api", '[data-toggle="pill"]', o);
  })(jQuery),
  (function (e) {
    "use strict";
    function t(t) {
      return this.each(function () {
        var i = e(this),
          o = i.data("bs.affix"),
          r = "object" == typeof t && t;
        o || i.data("bs.affix", (o = new n(this, r))),
          "string" == typeof t && o[t]();
      });
    }
    var n = function (t, i) {
      (this.options = e.extend({}, n.DEFAULTS, i)),
        (this.$target = e(this.options.target)
          .on("scroll.bs.affix.data-api", e.proxy(this.checkPosition, this))
          .on(
            "click.bs.affix.data-api",
            e.proxy(this.checkPositionWithEventLoop, this)
          )),
        (this.$element = e(t)),
        (this.affixed = null),
        (this.unpin = null),
        (this.pinnedOffset = null),
        this.checkPosition();
    };
    (n.VERSION = "3.3.6"),
      (n.RESET = "affix affix-top affix-bottom"),
      (n.DEFAULTS = { offset: 0, target: window }),
      (n.prototype.getState = function (e, t, n, i) {
        var o = this.$target.scrollTop(),
          r = this.$element.offset(),
          s = this.$target.height();
        if (null != n && "top" == this.affixed) return n > o && "top";
        if ("bottom" == this.affixed)
          return null != n
            ? !(o + this.unpin <= r.top) && "bottom"
            : !(e - i >= o + s) && "bottom";
        var a = null == this.affixed,
          l = a ? o : r.top;
        return null != n && n >= o
          ? "top"
          : null != i && l + (a ? s : t) >= e - i && "bottom";
      }),
      (n.prototype.getPinnedOffset = function () {
        if (this.pinnedOffset) return this.pinnedOffset;
        this.$element.removeClass(n.RESET).addClass("affix");
        var e = this.$target.scrollTop(),
          t = this.$element.offset();
        return (this.pinnedOffset = t.top - e);
      }),
      (n.prototype.checkPositionWithEventLoop = function () {
        setTimeout(e.proxy(this.checkPosition, this), 1);
      }),
      (n.prototype.checkPosition = function () {
        if (this.$element.is(":visible")) {
          var t = this.$element.height(),
            i = this.options.offset,
            o = i.top,
            r = i.bottom,
            s = Math.max(e(document).height(), e(document.body).height());
          "object" != typeof i && (r = o = i),
            "function" == typeof o && (o = i.top(this.$element)),
            "function" == typeof r && (r = i.bottom(this.$element));
          var a = this.getState(s, t, o, r);
          if (this.affixed != a) {
            null != this.unpin && this.$element.css("top", "");
            var l = "affix" + (a ? "-" + a : ""),
              c = e.Event(l + ".bs.affix");
            if ((this.$element.trigger(c), c.isDefaultPrevented())) return;
            (this.affixed = a),
              (this.unpin = "bottom" == a ? this.getPinnedOffset() : null),
              this.$element
                .removeClass(n.RESET)
                .addClass(l)
                .trigger(l.replace("affix", "affixed") + ".bs.affix");
          }
          "bottom" == a && this.$element.offset({ top: s - t - r });
        }
      });
    var i = e.fn.affix;
    (e.fn.affix = t),
      (e.fn.affix.Constructor = n),
      (e.fn.affix.noConflict = function () {
        return (e.fn.affix = i), this;
      }),
      e(window).on("load", function () {
        e('[data-spy="affix"]').each(function () {
          var n = e(this),
            i = n.data();
          (i.offset = i.offset || {}),
            null != i.offsetBottom && (i.offset.bottom = i.offsetBottom),
            null != i.offsetTop && (i.offset.top = i.offsetTop),
            t.call(n, i);
        });
      });
  })(jQuery),
  (function (e) {
    "function" == typeof define && define.amd
      ? define(["jquery"], e)
      : e(
          "object" == typeof exports
            ? require("jquery")
            : window.jQuery || window.Zepto
        );
  })(function (e) {
    var t,
      n,
      i,
      o,
      r,
      s,
      a = "Close",
      l = "BeforeClose",
      c = "MarkupParse",
      u = "Open",
      d = ".mfp",
      p = "mfp-ready",
      f = "mfp-removing",
      h = "mfp-prevent-close",
      m = function () {},
      g = !!window.jQuery,
      v = e(window),
      y = function (e, n) {
        t.ev.on("mfp" + e + d, n);
      },
      b = function (t, n, i, o) {
        var r = document.createElement("div");
        return (
          (r.className = "mfp-" + t),
          i && (r.innerHTML = i),
          o ? n && n.appendChild(r) : ((r = e(r)), n && r.appendTo(n)),
          r
        );
      },
      w = function (n, i) {
        t.ev.triggerHandler("mfp" + n, i),
          t.st.callbacks &&
            ((n = n.charAt(0).toLowerCase() + n.slice(1)),
            t.st.callbacks[n] &&
              t.st.callbacks[n].apply(t, e.isArray(i) ? i : [i]));
      },
      x = function (n) {
        return (
          (n === s && t.currTemplate.closeBtn) ||
            ((t.currTemplate.closeBtn = e(
              t.st.closeMarkup.replace("%title%", t.st.tClose)
            )),
            (s = n)),
          t.currTemplate.closeBtn
        );
      },
      C = function () {
        e.magnificPopup.instance ||
          ((t = new m()).init(), (e.magnificPopup.instance = t));
      };
    (m.prototype = {
      constructor: m,
      init: function () {
        var n = navigator.appVersion;
        (t.isLowIE = t.isIE8 = document.all && !document.addEventListener),
          (t.isAndroid = /android/gi.test(n)),
          (t.isIOS = /iphone|ipad|ipod/gi.test(n)),
          (t.supportsTransition = (function () {
            var e = document.createElement("p").style,
              t = ["ms", "O", "Moz", "Webkit"];
            if (void 0 !== e.transition) return !0;
            for (; t.length; ) if (t.pop() + "Transition" in e) return !0;
            return !1;
          })()),
          (t.probablyMobile =
            t.isAndroid ||
            t.isIOS ||
            /(Opera Mini)|Kindle|webOS|BlackBerry|(Opera Mobi)|(Windows Phone)|IEMobile/i.test(
              navigator.userAgent
            )),
          (i = e(document)),
          (t.popupsCache = {});
      },
      open: function (n) {
        var o;
        if (!1 === n.isObj) {
          (t.items = n.items.toArray()), (t.index = 0);
          var s,
            a = n.items;
          for (o = 0; o < a.length; o++)
            if (((s = a[o]).parsed && (s = s.el[0]), s === n.el[0])) {
              t.index = o;
              break;
            }
        } else
          (t.items = e.isArray(n.items) ? n.items : [n.items]),
            (t.index = n.index || 0);
        if (!t.isOpen) {
          (t.types = []),
            (r = ""),
            n.mainEl && n.mainEl.length ? (t.ev = n.mainEl.eq(0)) : (t.ev = i),
            n.key
              ? (t.popupsCache[n.key] || (t.popupsCache[n.key] = {}),
                (t.currTemplate = t.popupsCache[n.key]))
              : (t.currTemplate = {}),
            (t.st = e.extend(!0, {}, e.magnificPopup.defaults, n)),
            (t.fixedContentPos =
              "auto" === t.st.fixedContentPos
                ? !t.probablyMobile
                : t.st.fixedContentPos),
            t.st.modal &&
              ((t.st.closeOnContentClick = !1),
              (t.st.closeOnBgClick = !1),
              (t.st.showCloseBtn = !1),
              (t.st.enableEscapeKey = !1)),
            t.bgOverlay ||
              ((t.bgOverlay = b("bg").on("click" + d, function () {
                t.close();
              })),
              (t.wrap = b("wrap")
                .attr("tabindex", -1)
                .on("click" + d, function (e) {
                  t._checkIfClose(e.target) && t.close();
                })),
              (t.container = b("container", t.wrap))),
            (t.contentContainer = b("content")),
            t.st.preloader &&
              (t.preloader = b("preloader", t.container, t.st.tLoading));
          var l = e.magnificPopup.modules;
          for (o = 0; o < l.length; o++) {
            var f = l[o];
            (f = f.charAt(0).toUpperCase() + f.slice(1)), t["init" + f].call(t);
          }
          w("BeforeOpen"),
            t.st.showCloseBtn &&
              (t.st.closeBtnInside
                ? (y(c, function (e, t, n, i) {
                    n.close_replaceWith = x(i.type);
                  }),
                  (r += " mfp-close-btn-in"))
                : t.wrap.append(x())),
            t.st.alignTop && (r += " mfp-align-top"),
            t.fixedContentPos
              ? t.wrap.css({
                  overflow: t.st.overflowY,
                  overflowX: "hidden",
                  overflowY: t.st.overflowY,
                })
              : t.wrap.css({ top: v.scrollTop(), position: "absolute" }),
            (!1 === t.st.fixedBgPos ||
              ("auto" === t.st.fixedBgPos && !t.fixedContentPos)) &&
              t.bgOverlay.css({ height: i.height(), position: "absolute" }),
            t.st.enableEscapeKey &&
              i.on("keyup" + d, function (e) {
                27 === e.keyCode && t.close();
              }),
            v.on("resize" + d, function () {
              t.updateSize();
            }),
            t.st.closeOnContentClick || (r += " mfp-auto-cursor"),
            r && t.wrap.addClass(r);
          var h = (t.wH = v.height()),
            m = {};
          if (t.fixedContentPos && t._hasScrollBar(h)) {
            var g = t._getScrollbarSize();
            g && (m.marginRight = g);
          }
          t.fixedContentPos &&
            (t.isIE7
              ? e("body, html").css("overflow", "hidden")
              : (m.overflow = "hidden"));
          var C = t.st.mainClass;
          return (
            t.isIE7 && (C += " mfp-ie7"),
            C && t._addClassToMFP(C),
            t.updateItemHTML(),
            w("BuildControls"),
            e("html").css(m),
            t.bgOverlay
              .add(t.wrap)
              .prependTo(t.st.prependTo || e(document.body)),
            (t._lastFocusedEl = document.activeElement),
            setTimeout(function () {
              t.content
                ? (t._addClassToMFP(p), t._setFocus())
                : t.bgOverlay.addClass(p),
                i.on("focusin" + d, t._onFocusIn);
            }, 16),
            (t.isOpen = !0),
            t.updateSize(h),
            w(u),
            n
          );
        }
        t.updateItemHTML();
      },
      close: function () {
        t.isOpen &&
          (w(l),
          (t.isOpen = !1),
          t.st.removalDelay && !t.isLowIE && t.supportsTransition
            ? (t._addClassToMFP(f),
              setTimeout(function () {
                t._close();
              }, t.st.removalDelay))
            : t._close());
      },
      _close: function () {
        w(a);
        var n = f + " " + p + " ";
        if (
          (t.bgOverlay.detach(),
          t.wrap.detach(),
          t.container.empty(),
          t.st.mainClass && (n += t.st.mainClass + " "),
          t._removeClassFromMFP(n),
          t.fixedContentPos)
        ) {
          var o = { marginRight: "" };
          t.isIE7 ? e("body, html").css("overflow", "") : (o.overflow = ""),
            e("html").css(o);
        }
        i.off("keyup.mfp focusin" + d),
          t.ev.off(d),
          t.wrap.attr("class", "mfp-wrap").removeAttr("style"),
          t.bgOverlay.attr("class", "mfp-bg"),
          t.container.attr("class", "mfp-container"),
          !t.st.showCloseBtn ||
            (t.st.closeBtnInside && !0 !== t.currTemplate[t.currItem.type]) ||
            (t.currTemplate.closeBtn && t.currTemplate.closeBtn.detach()),
          t.st.autoFocusLast && t._lastFocusedEl && e(t._lastFocusedEl).focus(),
          (t.currItem = null),
          (t.content = null),
          (t.currTemplate = null),
          (t.prevHeight = 0),
          w("AfterClose");
      },
      updateSize: function (e) {
        if (t.isIOS) {
          var n = document.documentElement.clientWidth / window.innerWidth,
            i = window.innerHeight * n;
          t.wrap.css("height", i), (t.wH = i);
        } else t.wH = e || v.height();
        t.fixedContentPos || t.wrap.css("height", t.wH), w("Resize");
      },
      updateItemHTML: function () {
        var n = t.items[t.index];
        t.contentContainer.detach(),
          t.content && t.content.detach(),
          n.parsed || (n = t.parseEl(t.index));
        var i = n.type;
        if (
          (w("BeforeChange", [t.currItem ? t.currItem.type : "", i]),
          (t.currItem = n),
          !t.currTemplate[i])
        ) {
          var r = !!t.st[i] && t.st[i].markup;
          w("FirstMarkupParse", r), (t.currTemplate[i] = !r || e(r));
        }
        o && o !== n.type && t.container.removeClass("mfp-" + o + "-holder");
        var s = t["get" + i.charAt(0).toUpperCase() + i.slice(1)](
          n,
          t.currTemplate[i]
        );
        t.appendContent(s, i),
          (n.preloaded = !0),
          w("Change", n),
          (o = n.type),
          t.container.prepend(t.contentContainer),
          w("AfterChange");
      },
      appendContent: function (e, n) {
        (t.content = e),
          e
            ? t.st.showCloseBtn &&
              t.st.closeBtnInside &&
              !0 === t.currTemplate[n]
              ? t.content.find(".mfp-close").length || t.content.append(x())
              : (t.content = e)
            : (t.content = ""),
          w("BeforeAppend"),
          t.container.addClass("mfp-" + n + "-holder"),
          t.contentContainer.append(t.content);
      },
      parseEl: function (n) {
        var i,
          o = t.items[n];
        if (
          (o.tagName
            ? (o = { el: e(o) })
            : ((i = o.type), (o = { data: o, src: o.src })),
          o.el)
        ) {
          for (var r = t.types, s = 0; s < r.length; s++)
            if (o.el.hasClass("mfp-" + r[s])) {
              i = r[s];
              break;
            }
          (o.src = o.el.attr("data-mfp-src")),
            o.src || (o.src = o.el.attr("href"));
        }
        return (
          (o.type = i || t.st.type || "inline"),
          (o.index = n),
          (o.parsed = !0),
          (t.items[n] = o),
          w("ElementParse", o),
          t.items[n]
        );
      },
      addGroup: function (e, n) {
        var i = function (i) {
          (i.mfpEl = this), t._openClick(i, e, n);
        };
        n || (n = {});
        var o = "click.magnificPopup";
        (n.mainEl = e),
          n.items
            ? ((n.isObj = !0), e.off(o).on(o, i))
            : ((n.isObj = !1),
              n.delegate
                ? e.off(o).on(o, n.delegate, i)
                : ((n.items = e), e.off(o).on(o, i)));
      },
      _openClick: function (n, i, o) {
        if (
          (void 0 !== o.midClick
            ? o.midClick
            : e.magnificPopup.defaults.midClick) ||
          !(2 === n.which || n.ctrlKey || n.metaKey || n.altKey || n.shiftKey)
        ) {
          var r =
            void 0 !== o.disableOn
              ? o.disableOn
              : e.magnificPopup.defaults.disableOn;
          if (r)
            if (e.isFunction(r)) {
              if (!r.call(t)) return !0;
            } else if (v.width() < r) return !0;
          n.type && (n.preventDefault(), t.isOpen && n.stopPropagation()),
            (o.el = e(n.mfpEl)),
            o.delegate && (o.items = i.find(o.delegate)),
            t.open(o);
        }
      },
      updateStatus: function (e, i) {
        if (t.preloader) {
          n !== e && t.container.removeClass("mfp-s-" + n),
            i || "loading" !== e || (i = t.st.tLoading);
          var o = { status: e, text: i };
          w("UpdateStatus", o),
            (e = o.status),
            (i = o.text),
            t.preloader.html(i),
            t.preloader.find("a").on("click", function (e) {
              e.stopImmediatePropagation();
            }),
            t.container.addClass("mfp-s-" + e),
            (n = e);
        }
      },
      _checkIfClose: function (n) {
        if (!e(n).hasClass(h)) {
          var i = t.st.closeOnContentClick,
            o = t.st.closeOnBgClick;
          if (i && o) return !0;
          if (
            !t.content ||
            e(n).hasClass("mfp-close") ||
            (t.preloader && n === t.preloader[0])
          )
            return !0;
          if (n === t.content[0] || e.contains(t.content[0], n)) {
            if (i) return !0;
          } else if (o && e.contains(document, n)) return !0;
          return !1;
        }
      },
      _addClassToMFP: function (e) {
        t.bgOverlay.addClass(e), t.wrap.addClass(e);
      },
      _removeClassFromMFP: function (e) {
        this.bgOverlay.removeClass(e), t.wrap.removeClass(e);
      },
      _hasScrollBar: function (e) {
        return (
          (t.isIE7 ? i.height() : document.body.scrollHeight) >
          (e || v.height())
        );
      },
      _setFocus: function () {
        (t.st.focus ? t.content.find(t.st.focus).eq(0) : t.wrap).focus();
      },
      _onFocusIn: function (n) {
        return n.target === t.wrap[0] || e.contains(t.wrap[0], n.target)
          ? void 0
          : (t._setFocus(), !1);
      },
      _parseMarkup: function (t, n, i) {
        var o;
        i.data && (n = e.extend(i.data, n)),
          w(c, [t, n, i]),
          e.each(n, function (n, i) {
            if (void 0 === i || !1 === i) return !0;
            if ((o = n.split("_")).length > 1) {
              var r = t.find(d + "-" + o[0]);
              if (r.length > 0) {
                var s = o[1];
                "replaceWith" === s
                  ? r[0] !== i[0] && r.replaceWith(i)
                  : "img" === s
                  ? r.is("img")
                    ? r.attr("src", i)
                    : r.replaceWith(
                        e("<img>").attr("src", i).attr("class", r.attr("class"))
                      )
                  : r.attr(o[1], i);
              }
            } else t.find(d + "-" + n).html(i);
          });
      },
      _getScrollbarSize: function () {
        if (void 0 === t.scrollbarSize) {
          var e = document.createElement("div");
          (e.style.cssText =
            "width: 99px; height: 99px; overflow: scroll; position: absolute; top: -9999px;"),
            document.body.appendChild(e),
            (t.scrollbarSize = e.offsetWidth - e.clientWidth),
            document.body.removeChild(e);
        }
        return t.scrollbarSize;
      },
    }),
      (e.magnificPopup = {
        instance: null,
        proto: m.prototype,
        modules: [],
        open: function (t, n) {
          return (
            C(),
            ((t = t ? e.extend(!0, {}, t) : {}).isObj = !0),
            (t.index = n || 0),
            this.instance.open(t)
          );
        },
        close: function () {
          return e.magnificPopup.instance && e.magnificPopup.instance.close();
        },
        registerModule: function (t, n) {
          n.options && (e.magnificPopup.defaults[t] = n.options),
            e.extend(this.proto, n.proto),
            this.modules.push(t);
        },
        defaults: {
          disableOn: 0,
          key: null,
          midClick: !1,
          mainClass: "",
          preloader: !0,
          focus: "",
          closeOnContentClick: !1,
          closeOnBgClick: !0,
          closeBtnInside: !0,
          showCloseBtn: !0,
          enableEscapeKey: !0,
          modal: !1,
          alignTop: !1,
          removalDelay: 0,
          prependTo: null,
          fixedContentPos: "auto",
          fixedBgPos: "auto",
          overflowY: "auto",
          closeMarkup:
            '<button title="%title%" type="button" class="mfp-close">&#215;</button>',
          tClose: "Close (Esc)",
          tLoading: "Loading...",
          autoFocusLast: !0,
        },
      }),
      (e.fn.magnificPopup = function (n) {
        C();
        var i = e(this);
        if ("string" == typeof n)
          if ("open" === n) {
            var o,
              r = g ? i.data("magnificPopup") : i[0].magnificPopup,
              s = parseInt(arguments[1], 10) || 0;
            r.items
              ? (o = r.items[s])
              : ((o = i),
                r.delegate && (o = o.find(r.delegate)),
                (o = o.eq(s))),
              t._openClick({ mfpEl: o }, i, r);
          } else
            t.isOpen && t[n].apply(t, Array.prototype.slice.call(arguments, 1));
        else
          (n = e.extend(!0, {}, n)),
            g ? i.data("magnificPopup", n) : (i[0].magnificPopup = n),
            t.addGroup(i, n);
        return i;
      });
    var T,
      E,
      k,
      _ = "inline",
      S = function () {
        k && (E.after(k.addClass(T)).detach(), (k = null));
      };
    e.magnificPopup.registerModule(_, {
      options: {
        hiddenClass: "hide",
        markup: "",
        tNotFound: "Content not found",
      },
      proto: {
        initInline: function () {
          t.types.push(_),
            y(a + "." + _, function () {
              S();
            });
        },
        getInline: function (n, i) {
          if ((S(), n.src)) {
            var o = t.st.inline,
              r = e(n.src);
            if (r.length) {
              var s = r[0].parentNode;
              s &&
                s.tagName &&
                (E || ((T = o.hiddenClass), (E = b(T)), (T = "mfp-" + T)),
                (k = r.after(E).detach().removeClass(T))),
                t.updateStatus("ready");
            } else t.updateStatus("error", o.tNotFound), (r = e("<div>"));
            return (n.inlineElement = r), r;
          }
          return t.updateStatus("ready"), t._parseMarkup(i, {}, n), i;
        },
      },
    });
    var N,
      A,
      $,
      I = "ajax",
      D = function () {
        N && e(document.body).removeClass(N);
      },
      O = function () {
        D(), t.req && t.req.abort();
      };
    e.magnificPopup.registerModule(I, {
      options: {
        settings: null,
        cursor: "mfp-ajax-cur",
        tError: '<a href="%url%">The content</a> could not be loaded.',
      },
      proto: {
        initAjax: function () {
          t.types.push(I),
            (N = t.st.ajax.cursor),
            y(a + "." + I, O),
            y("BeforeChange." + I, O);
        },
        getAjax: function (n) {
          N && e(document.body).addClass(N), t.updateStatus("loading");
          var i = e.extend(
            {
              url: n.src,
              success: function (i, o, r) {
                var s = { data: i, xhr: r };
                w("ParseAjax", s),
                  t.appendContent(e(s.data), I),
                  (n.finished = !0),
                  D(),
                  t._setFocus(),
                  setTimeout(function () {
                    t.wrap.addClass(p);
                  }, 16),
                  t.updateStatus("ready"),
                  w("AjaxContentAdded");
              },
              error: function () {
                D(),
                  (n.finished = n.loadError = !0),
                  t.updateStatus(
                    "error",
                    t.st.ajax.tError.replace("%url%", n.src)
                  );
              },
            },
            t.st.ajax.settings
          );
          return (t.req = e.ajax(i)), "";
        },
      },
    }),
      e.magnificPopup.registerModule("image", {
        options: {
          markup:
            '<div class="mfp-figure"><div class="mfp-close"></div><figure><div class="mfp-img"></div><figcaption><div class="mfp-bottom-bar"><div class="mfp-title"></div><div class="mfp-counter"></div></div></figcaption></figure></div>',
          cursor: "mfp-zoom-out-cur",
          titleSrc: "title",
          verticalFit: !0,
          tError: '<a href="%url%">The image</a> could not be loaded.',
        },
        proto: {
          initImage: function () {
            var n = t.st.image,
              i = ".image";
            t.types.push("image"),
              y(u + i, function () {
                "image" === t.currItem.type &&
                  n.cursor &&
                  e(document.body).addClass(n.cursor);
              }),
              y(a + i, function () {
                n.cursor && e(document.body).removeClass(n.cursor),
                  v.off("resize" + d);
              }),
              y("Resize" + i, t.resizeImage),
              t.isLowIE && y("AfterChange", t.resizeImage);
          },
          resizeImage: function () {
            var e = t.currItem;
            if (e && e.img && t.st.image.verticalFit) {
              var n = 0;
              t.isLowIE &&
                (n =
                  parseInt(e.img.css("padding-top"), 10) +
                  parseInt(e.img.css("padding-bottom"), 10)),
                e.img.css("max-height", t.wH - n);
            }
          },
          _onImageHasSize: function (e) {
            e.img &&
              ((e.hasSize = !0),
              A && clearInterval(A),
              (e.isCheckingImgSize = !1),
              w("ImageHasSize", e),
              e.imgHidden &&
                (t.content && t.content.removeClass("mfp-loading"),
                (e.imgHidden = !1)));
          },
          findImageSize: function (e) {
            var n = 0,
              i = e.img[0],
              o = function (r) {
                A && clearInterval(A),
                  (A = setInterval(function () {
                    return i.naturalWidth > 0
                      ? void t._onImageHasSize(e)
                      : (n > 200 && clearInterval(A),
                        void (3 == ++n
                          ? o(10)
                          : 40 === n
                          ? o(50)
                          : 100 === n && o(500)));
                  }, r));
              };
            o(1);
          },
          getImage: function (n, i) {
            var o = 0,
              r = function () {
                n &&
                  (n.img[0].complete
                    ? (n.img.off(".mfploader"),
                      n === t.currItem &&
                        (t._onImageHasSize(n), t.updateStatus("ready")),
                      (n.hasSize = !0),
                      (n.loaded = !0),
                      w("ImageLoadComplete"))
                    : 200 > ++o
                    ? setTimeout(r, 100)
                    : s());
              },
              s = function () {
                n &&
                  (n.img.off(".mfploader"),
                  n === t.currItem &&
                    (t._onImageHasSize(n),
                    t.updateStatus("error", a.tError.replace("%url%", n.src))),
                  (n.hasSize = !0),
                  (n.loaded = !0),
                  (n.loadError = !0));
              },
              a = t.st.image,
              l = i.find(".mfp-img");
            if (l.length) {
              var c = document.createElement("img");
              (c.className = "mfp-img"),
                n.el &&
                  n.el.find("img").length &&
                  (c.alt = n.el.find("img").attr("alt")),
                (n.img = e(c).on("load.mfploader", r).on("error.mfploader", s)),
                (c.src = n.src),
                l.is("img") && (n.img = n.img.clone()),
                (c = n.img[0]).naturalWidth > 0
                  ? (n.hasSize = !0)
                  : c.width || (n.hasSize = !1);
            }
            return (
              t._parseMarkup(
                i,
                {
                  title: (function (n) {
                    if (n.data && void 0 !== n.data.title) return n.data.title;
                    var i = t.st.image.titleSrc;
                    if (i) {
                      if (e.isFunction(i)) return i.call(t, n);
                      if (n.el) return n.el.attr(i) || "";
                    }
                    return "";
                  })(n),
                  img_replaceWith: n.img,
                },
                n
              ),
              t.resizeImage(),
              n.hasSize
                ? (A && clearInterval(A),
                  n.loadError
                    ? (i.addClass("mfp-loading"),
                      t.updateStatus("error", a.tError.replace("%url%", n.src)))
                    : (i.removeClass("mfp-loading"), t.updateStatus("ready")),
                  i)
                : (t.updateStatus("loading"),
                  (n.loading = !0),
                  n.hasSize ||
                    ((n.imgHidden = !0),
                    i.addClass("mfp-loading"),
                    t.findImageSize(n)),
                  i)
            );
          },
        },
      }),
      e.magnificPopup.registerModule("zoom", {
        options: {
          enabled: !1,
          easing: "ease-in-out",
          duration: 300,
          opener: function (e) {
            return e.is("img") ? e : e.find("img");
          },
        },
        proto: {
          initZoom: function () {
            var e,
              n = t.st.zoom,
              i = ".zoom";
            if (n.enabled && t.supportsTransition) {
              var o,
                r,
                s = n.duration,
                c = function (e) {
                  var t = e
                      .clone()
                      .removeAttr("style")
                      .removeAttr("class")
                      .addClass("mfp-animated-image"),
                    i = "all " + n.duration / 1e3 + "s " + n.easing,
                    o = {
                      position: "fixed",
                      zIndex: 9999,
                      left: 0,
                      top: 0,
                      "-webkit-backface-visibility": "hidden",
                    },
                    r = "transition";
                  return (
                    (o["-webkit-" + r] =
                      o["-moz-" + r] =
                      o["-o-" + r] =
                      o[r] =
                        i),
                    t.css(o),
                    t
                  );
                },
                u = function () {
                  t.content.css("visibility", "visible");
                };
              y("BuildControls" + i, function () {
                if (t._allowZoom()) {
                  if (
                    (clearTimeout(o),
                    t.content.css("visibility", "hidden"),
                    !(e = t._getItemToZoom()))
                  )
                    return void u();
                  (r = c(e)).css(t._getOffset()),
                    t.wrap.append(r),
                    (o = setTimeout(function () {
                      r.css(t._getOffset(!0)),
                        (o = setTimeout(function () {
                          u(),
                            setTimeout(function () {
                              r.remove(),
                                (e = r = null),
                                w("ZoomAnimationEnded");
                            }, 16);
                        }, s));
                    }, 16));
                }
              }),
                y(l + i, function () {
                  if (t._allowZoom()) {
                    if ((clearTimeout(o), (t.st.removalDelay = s), !e)) {
                      if (!(e = t._getItemToZoom())) return;
                      r = c(e);
                    }
                    r.css(t._getOffset(!0)),
                      t.wrap.append(r),
                      t.content.css("visibility", "hidden"),
                      setTimeout(function () {
                        r.css(t._getOffset());
                      }, 16);
                  }
                }),
                y(a + i, function () {
                  t._allowZoom() && (u(), r && r.remove(), (e = null));
                });
            }
          },
          _allowZoom: function () {
            return "image" === t.currItem.type;
          },
          _getItemToZoom: function () {
            return !!t.currItem.hasSize && t.currItem.img;
          },
          _getOffset: function (n) {
            var i,
              o = (i = n
                ? t.currItem.img
                : t.st.zoom.opener(t.currItem.el || t.currItem)).offset(),
              r = parseInt(i.css("padding-top"), 10),
              s = parseInt(i.css("padding-bottom"), 10);
            o.top -= e(window).scrollTop() - r;
            var a = {
              width: i.width(),
              height: (g ? i.innerHeight() : i[0].offsetHeight) - s - r,
            };
            return (
              void 0 === $ &&
                ($ = void 0 !== document.createElement("p").style.MozTransform),
              $
                ? (a["-moz-transform"] = a.transform =
                    "translate(" + o.left + "px," + o.top + "px)")
                : ((a.left = o.left), (a.top = o.top)),
              a
            );
          },
        },
      });
    var L = "iframe",
      j = function (e) {
        if (t.currTemplate[L]) {
          var n = t.currTemplate[L].find("iframe");
          n.length &&
            (e || (n[0].src = "//about:blank"),
            t.isIE8 && n.css("display", e ? "block" : "none"));
        }
      };
    e.magnificPopup.registerModule(L, {
      options: {
        markup:
          '<div class="mfp-iframe-scaler"><div class="mfp-close"></div><iframe class="mfp-iframe" src="//about:blank" frameborder="0" allowfullscreen></iframe></div>',
        srcAction: "iframe_src",
        patterns: {
          youtube: {
            index: "youtube.com",
            id: "v=",
            src: "//www.youtube.com/embed/%id%?autoplay=1",
          },
          vimeo: {
            index: "vimeo.com/",
            id: "/",
            src: "//player.vimeo.com/video/%id%?autoplay=1",
          },
          gmaps: { index: "//maps.google.", src: "%id%&output=embed" },
        },
      },
      proto: {
        initIframe: function () {
          t.types.push(L),
            y("BeforeChange", function (e, t, n) {
              t !== n && (t === L ? j() : n === L && j(!0));
            }),
            y(a + "." + L, function () {
              j();
            });
        },
        getIframe: function (n, i) {
          var o = n.src,
            r = t.st.iframe;
          e.each(r.patterns, function () {
            return o.indexOf(this.index) > -1
              ? (this.id &&
                  (o =
                    "string" == typeof this.id
                      ? o.substr(
                          o.lastIndexOf(this.id) + this.id.length,
                          o.length
                        )
                      : this.id.call(this, o)),
                (o = this.src.replace("%id%", o)),
                !1)
              : void 0;
          });
          var s = {};
          return (
            r.srcAction && (s[r.srcAction] = o),
            t._parseMarkup(i, s, n),
            t.updateStatus("ready"),
            i
          );
        },
      },
    });
    var P = function (e) {
        var n = t.items.length;
        return e > n - 1 ? e - n : 0 > e ? n + e : e;
      },
      M = function (e, t, n) {
        return e.replace(/%curr%/gi, t + 1).replace(/%total%/gi, n);
      };
    e.magnificPopup.registerModule("gallery", {
      options: {
        enabled: !1,
        arrowMarkup:
          '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"></button>',
        preload: [0, 2],
        navigateByImgClick: !0,
        arrows: !0,
        tPrev: "Previous (Left arrow key)",
        tNext: "Next (Right arrow key)",
        tCounter: "%curr% of %total%",
      },
      proto: {
        initGallery: function () {
          var n = t.st.gallery,
            o = ".mfp-gallery";
          return (
            (t.direction = !0),
            !(!n || !n.enabled) &&
              ((r += " mfp-gallery"),
              y(u + o, function () {
                n.navigateByImgClick &&
                  t.wrap.on("click" + o, ".mfp-img", function () {
                    return t.items.length > 1 ? (t.next(), !1) : void 0;
                  }),
                  i.on("keydown" + o, function (e) {
                    37 === e.keyCode ? t.prev() : 39 === e.keyCode && t.next();
                  });
              }),
              y("UpdateStatus" + o, function (e, n) {
                n.text &&
                  (n.text = M(n.text, t.currItem.index, t.items.length));
              }),
              y(c + o, function (e, i, o, r) {
                var s = t.items.length;
                o.counter = s > 1 ? M(n.tCounter, r.index, s) : "";
              }),
              y("BuildControls" + o, function () {
                if (t.items.length > 1 && n.arrows && !t.arrowLeft) {
                  var i = n.arrowMarkup,
                    o = (t.arrowLeft = e(
                      i.replace(/%title%/gi, n.tPrev).replace(/%dir%/gi, "left")
                    ).addClass(h)),
                    r = (t.arrowRight = e(
                      i
                        .replace(/%title%/gi, n.tNext)
                        .replace(/%dir%/gi, "right")
                    ).addClass(h));
                  o.click(function () {
                    t.prev();
                  }),
                    r.click(function () {
                      t.next();
                    }),
                    t.container.append(o.add(r));
                }
              }),
              y("Change" + o, function () {
                t._preloadTimeout && clearTimeout(t._preloadTimeout),
                  (t._preloadTimeout = setTimeout(function () {
                    t.preloadNearbyImages(), (t._preloadTimeout = null);
                  }, 16));
              }),
              void y(a + o, function () {
                i.off(o),
                  t.wrap.off("click" + o),
                  (t.arrowRight = t.arrowLeft = null);
              }))
          );
        },
        next: function () {
          (t.direction = !0), (t.index = P(t.index + 1)), t.updateItemHTML();
        },
        prev: function () {
          (t.direction = !1), (t.index = P(t.index - 1)), t.updateItemHTML();
        },
        goTo: function (e) {
          (t.direction = e >= t.index), (t.index = e), t.updateItemHTML();
        },
        preloadNearbyImages: function () {
          var e,
            n = t.st.gallery.preload,
            i = Math.min(n[0], t.items.length),
            o = Math.min(n[1], t.items.length);
          for (e = 1; e <= (t.direction ? o : i); e++)
            t._preloadItem(t.index + e);
          for (e = 1; e <= (t.direction ? i : o); e++)
            t._preloadItem(t.index - e);
        },
        _preloadItem: function (n) {
          if (((n = P(n)), !t.items[n].preloaded)) {
            var i = t.items[n];
            i.parsed || (i = t.parseEl(n)),
              w("LazyLoad", i),
              "image" === i.type &&
                (i.img = e('<img class="mfp-img" />')
                  .on("load.mfploader", function () {
                    i.hasSize = !0;
                  })
                  .on("error.mfploader", function () {
                    (i.hasSize = !0), (i.loadError = !0), w("LazyLoadError", i);
                  })
                  .attr("src", i.src)),
              (i.preloaded = !0);
          }
        },
      },
    });
    var z = "retina";
    e.magnificPopup.registerModule(z, {
      options: {
        replaceSrc: function (e) {
          return e.src.replace(/\.\w+$/, function (e) {
            return "@2x" + e;
          });
        },
        ratio: 1,
      },
      proto: {
        initRetina: function () {
          if (window.devicePixelRatio > 1) {
            var e = t.st.retina,
              n = e.ratio;
            (n = isNaN(n) ? n() : n) > 1 &&
              (y("ImageHasSize." + z, function (e, t) {
                t.img.css({
                  "max-width": t.img[0].naturalWidth / n,
                  width: "100%",
                });
              }),
              y("ElementParse." + z, function (t, i) {
                i.src = e.replaceSrc(i, n);
              }));
          }
        },
      },
    }),
      C();
  });
var offset_main,
  offset_header,
  resize_id,
  recaptcha_load_callback = function () {
    grecaptcha
      .execute("6LfdZ5sUAAAAAJOZj3hYdWoFLxROFMT49ImPSrOm", {
        action: "validate_captcha",
      })
      .then(function (e) {
        for (
          var t = document.getElementsByClassName("g-recaptcha-response"),
            n = 0;
          n < t.length;
          n++
        )
          t[n].setAttribute("value", e);
      }),
      setInterval(function () {
        grecaptcha
          .execute("6LfdZ5sUAAAAAJOZj3hYdWoFLxROFMT49ImPSrOm", {
            action: "validate_captcha",
          })
          .then(function (e) {
            for (
              var t = document.getElementsByClassName("g-recaptcha-response"),
                n = 0;
              n < t.length;
              n++
            )
              t[n].setAttribute("value", e);
          });
      }, 9e4);
  },
  window_size_mobile = 970;
function doneResizing() {
  offset_header = $(window).width() <= window_size_mobile ? 60 : 160;
}
$(document).ready(function () {
  if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
    var e = document.createElement("style");
    e.appendChild(
      document.createTextNode("@-ms-viewport{width:auto!important}")
    ),
      document.querySelector("head").appendChild(e);
  }
  (offset_main = $("body > div:first-of-type").offset()),
    doneResizing(),
    scroll_if_anchor(window.location.hash),
    $("body").on("click", 'a[href*="#"]:not([href="#"])', scroll_if_anchor);
  var t = $("nav, .cart, header .search-contain");
  $(".show-nav, .close-nav").click(function () {
    return (
      $("nav").hasClass("shown")
        ? $("nav").removeClass("shown")
        : $("nav").addClass("shown"),
      !1
    );
  }),
    $(".show-search").click(function () {
      return (
        $("header .search-contain").hasClass("shown")
          ? $("header .search-contain").removeClass("shown")
          : $("header .search-contain").addClass("shown"),
        !1
      );
    }),
    $(".show-nav-sub-sub").click(function () {
      return (
        $(".show-nav-sub-sub i").toggleClass("shown"),
        $(".nav-sub-sub").toggleClass("shown"),
        !1
      );
    }),
    $(document).click(function () {
      t.removeClass("shown");
    }),
    $(
      ".show-nav, .show-search, nav, header .search-contain, .nl-signup-nav, .show-cart, .cart"
    ).click(function (e) {
      e.stopPropagation();
    }),
    -1 != window.location.href.indexOf("products-pla")
      ? (cart_var_gref = "g-get20")
      : $(".banner-flash15nw").length
      ? (cart_var_gref = "flash15nw")
      : "undefined" != typeof cart_var_gref ||
        (cart_var_gref = getQueryVariable("gref")),
    // update_mini_cart(cart_var_gref),
    "undefined" != typeof aff_code ||
      ((aff_code = getQueryVariable("aff")),
      "" !== aff_code && ga("all.set", "dimension2", aff_code)),
    $("form.nl-signup-form").append(
      "<input type='hidden' name='sc_req' value='0' />"
    ),
    $("body").on("click", ".notice .close", function (e) {
      $(".notice").slideUp(400);
    }),
    $(".popup, .popup-win").click(function () {
      return (
        window.open(
          $(this).attr("href"),
          "",
          "scrollbars=yes,menubar=no,toolbar=no,width=780,height=700"
        ),
        !1
      );
    }),
    $(".popup-ajax").each(function (e, t) {
      $(this).attr("href", $(this).attr("href") + "?type=popup");
    }),
    $(".popup-ajax").magnificPopup({ type: "ajax", overflowY: "scroll" }),
    $(".popup-image").magnificPopup({
      type: "image",
      fixedContentPos: !0,
      closeOnContentClick: !0,
      mainClass: "mfp-no-margins mfp-with-zoom",
      image: { verticalFit: !0 },
    }),
    isSecure()
      ? $("#search-term").autocomplete({
          minLength: 3,
          source: function (e, t) {
            $.ajax({
              url: "https://shop.naturalwellness.com/api/search-autocomplete.asp",
              dataType: "jsonp",
              jsonpCallback: "jsonCallback",
              contentType: "application/json",
              data: { term: e.term },
              success: function (e) {
                t(e);
              },
            });
          },
          delay: 200,
          appendTo: ".search-contain form",
          position: {
            my: "left top",
            at: "left bottom",
            of: $(".search-contain form"),
          },
          focus: function (e, t) {
            return $("#search-term").val(t.item.label), !1;
          },
          select: function (e, t) {
            return $(".search-contain form").submit(), !1;
          },
          open: function (e, t) {
            $(".search-overlay").fadeIn(100);
          },
          close: function (e, t) {
            $(".search-overlay").fadeOut(100);
          },
        })
      : $("#search-term").autocomplete({
          minLength: 3,
          source: "http://www.naturalwellness.com/api/search.php",
          delay: 200,
          appendTo: ".search-contain form",
          position: {
            my: "left top",
            at: "left bottom",
            of: $(".search-contain form"),
          },
          focus: function (e, t) {
            return $("#search-term").val(t.item.label), !1;
          },
          select: function (e, t) {
            return $(".search-contain form").submit(), !1;
          },
          open: function (e, t) {
            $(".search-overlay").fadeIn(200);
          },
          close: function (e, t) {
            $(".search-overlay").fadeOut(200);
          },
        }),
    $("#search-term").focus(function (e) {
      $(this).val("");
    }),
    $(".nl-signup-form").submit(function (e) {
      (email = $(this).find("input[name='email']").val()),
        validateEmail(email) &&
          localStorage.setItem("activeCampaignEmail", email);
    }),
    $(".notice-cookie").length &&
      (getCookie("pr_checked") ||
        ($(".notice-cookie").removeClass("noshow"),
        $(".notice-close").click(function (e) {
          $(this).closest(".notice-cookie").addClass("noshow"),
            (document.cookie = "pr_checked=1;path=/");
        }),
        $(".notice-cookie .privacy").click(function (e) {
          return (document.cookie = "pr_checked=1;path=/"), !0;
        })));
}),
  $(document).scroll(function (e) {
    $(document).scrollTop() > offset_main.top
      ? $("body").hasClass("scrolly") ||
        ($("body").addClass("scrolly").css("top", offset_main.top),
        $("header").animate({ top: "0px" }, 300))
      : ($("body").removeClass("scrolly"), $("header").removeAttr("style"));
  }),
  $(window).resize(function () {
    clearTimeout(resize_id), (resize_id = setTimeout(doneResizing, 500));
  }),
  (function (e, t, n) {
    "use strict";
    function i(e) {
      return e.trim ? e.trim() : e.replace(/^\s+|\s+$/g, "");
    }
    function o(e, t) {
      return e.res - t.res;
    }
    function r(e, t) {
      var n, i, o;
      if (e && t)
        for (o = T.parseSet(t), e = T.makeUrl(e), n = 0; n < o.length; n++)
          if (e == T.makeUrl(o[n].url)) {
            i = o[n];
            break;
          }
      return i;
    }
    t.createElement("picture");
    var s,
      a,
      l,
      c,
      u,
      d,
      p,
      f,
      h,
      m,
      g,
      v,
      y,
      b,
      w,
      x,
      C,
      T = {},
      E = function () {},
      k = t.createElement("img"),
      _ = k.getAttribute,
      S = k.setAttribute,
      N = k.removeAttribute,
      A = t.documentElement,
      $ = {},
      I = { xQuant: 1, lazyFactor: 0.4, maxX: 2 },
      D = "data-risrc",
      O = D + "set",
      L = "webkitBackfaceVisibility" in A.style,
      j = navigator.userAgent,
      P =
        /rident/.test(j) ||
        (/ecko/.test(j) && j.match(/rv\:(\d+)/) && RegExp.$1 > 35),
      M = "currentSrc",
      z = /\s+\+?\d+(e\d+)?w/,
      H = /((?:\([^)]+\)(?:\s*and\s*|\s*or\s*|\s*not\s*)?)+)?\s*(.+)/,
      R = /^([\+eE\d\.]+)(w|x)$/,
      W = /\s*\d+h\s*/,
      F = e.respimgCFG,
      B =
        (location.protocol,
        "position:absolute;left:0;visibility:hidden;display:block;padding:0;border:none;font-size:1em;width:1em;overflow:hidden;clip:rect(0px, 0px, 0px, 0px)"),
      q = "font-size:100%!important;",
      U = !0,
      V = {},
      X = {},
      Q = e.devicePixelRatio,
      G = { px: 1, in: 96 },
      K = t.createElement("a"),
      Y = !1,
      Z = function (e, t, n, i) {
        e.addEventListener
          ? e.addEventListener(t, n, i || !1)
          : e.attachEvent && e.attachEvent("on" + t, n);
      },
      J = function (e) {
        var t = {};
        return function (n) {
          return n in t || (t[n] = e(n)), t[n];
        };
      },
      ee =
        ((g = /^([\d\.]+)(em|vw|px)$/),
        (v = J(function (e) {
          return (
            "return " +
            (function () {
              for (var e = arguments, t = 0, n = e[0]; ++t in e; )
                n = n.replace(e[t], e[++t]);
              return n;
            })(
              (e || "").toLowerCase(),
              /\band\b/g,
              "&&",
              /,/g,
              "||",
              /min-([a-z-\s]+):/g,
              "e.$1>=",
              /max-([a-z-\s]+):/g,
              "e.$1<=",
              /calc([^)]+)/g,
              "($1)",
              /(\d+[\.]*[\d]*)([a-z]+)/g,
              "($1 * e.$2)",
              /^(?!(e.[a-z]|[0-9\.&=|><\+\-\*\(\)\/])).*/gi,
              ""
            )
          );
        })),
        function (e, t) {
          var n;
          if (!(e in V))
            if (((V[e] = !1), t && (n = e.match(g)))) V[e] = n[1] * G[n[2]];
            else
              try {
                V[e] = new Function("e", v(e))(G);
              } catch (e) {}
          return V[e];
        }),
      te = function (e, t) {
        return (
          e.w
            ? ((e.cWidth = T.calcListLength(t || "100vw")),
              (e.res = e.w / e.cWidth))
            : (e.res = e.x),
          e
        );
      },
      ne = function (n) {
        var i,
          o,
          r,
          s = n || {};
        if (
          (s.elements &&
            1 == s.elements.nodeType &&
            ("IMG" == s.elements.nodeName.toUpperCase()
              ? (s.elements = [s.elements])
              : ((s.context = s.elements), (s.elements = null))),
          s.reparse &&
            !s.reevaluate &&
            ((s.reevaluate = !0),
            e.console &&
              console.warn &&
              console.warn("reparse was renamed to reevaluate!")),
          (r = (i =
            s.elements ||
            T.qsa(
              s.context || t,
              s.reevaluate || s.reselect ? T.sel : T.selShort
            )).length))
        ) {
          for (T.setupRun(s), Y = !0, o = 0; r > o; o++) T.fillImg(i[o], s);
          T.teardownRun(s);
        }
      },
      ie = J(function (e) {
        var t = [1, "x"],
          n = i(e || "");
        return (
          n &&
            (t = !!(n = n.replace(W, "")).match(R) && [
              1 * RegExp.$1,
              RegExp.$2,
            ]),
          t
        );
      });
    M in k || (M = "src"),
      ($["image/jpeg"] = !0),
      ($["image/gif"] = !0),
      ($["image/png"] = !0),
      ($["image/svg+xml"] = t.implementation.hasFeature(
        "http://wwwindow.w3.org/TR/SVG11/feature#Image",
        "1.1"
      )),
      (T.ns = ("ri" + new Date().getTime()).substr(0, 9)),
      (T.supSrcset = "srcset" in k),
      (T.supSizes = "sizes" in k),
      (T.selShort = "picture>img,img[srcset]"),
      (T.sel = T.selShort),
      (T.cfg = I),
      T.supSrcset && (T.sel += ",img[" + O + "]"),
      (T.DPR = Q || 1),
      (T.u = G),
      (T.types = $),
      (f = T.supSrcset && !T.supSizes),
      (T.setSize = E),
      (T.makeUrl = J(function (e) {
        return (K.href = e), K.href;
      })),
      (T.qsa = function (e, t) {
        return e.querySelectorAll(t);
      }),
      (T.matchesMedia = function () {
        return (
          (T.matchesMedia =
            e.matchMedia && (matchMedia("(min-width: 0.1em)") || {}).matches
              ? function (e) {
                  return !e || matchMedia(e).matches;
                }
              : T.mMQ),
          T.matchesMedia.apply(this, arguments)
        );
      }),
      (T.mMQ = function (e) {
        return !e || ee(e);
      }),
      (T.calcLength = function (e) {
        var t = ee(e, !0) || !1;
        return 0 > t && (t = !1), t;
      }),
      (T.supportsType = function (e) {
        return !e || $[e];
      }),
      (T.parseSize = J(function (e) {
        var t = (e || "").match(H);
        return { media: t && t[1], length: t && t[2] };
      })),
      (T.parseSet = function (e) {
        if (!e.cands) {
          var t,
            n,
            i,
            o,
            r,
            s = e.srcset;
          for (e.cands = []; s; )
            (i = null),
              -1 != (t = (s = s.replace(/^\s+/g, "")).search(/\s/g))
                ? (("," != (n = s.slice(0, t)).charAt(n.length - 1) && n) ||
                    ((n = n.replace(/,+$/, "")), (i = "")),
                  (s = s.slice(t + 1)),
                  null == i &&
                    (-1 != (o = s.indexOf(","))
                      ? ((i = s.slice(0, o)), (s = s.slice(o + 1)))
                      : ((i = s), (s = ""))))
                : ((n = s), (s = "")),
              n &&
                (i = ie(i)) &&
                (((r = { url: n.replace(/^,+/, ""), set: e })[i[1]] = i[0]),
                "x" == i[1] && 1 == i[0] && (e.has1x = !0),
                e.cands.push(r));
        }
        return e.cands;
      }),
      (T.getEmValue = function () {
        var e;
        if (!p && (e = t.body)) {
          var n = t.createElement("div"),
            i = A.style.cssText,
            o = e.style.cssText;
          (n.style.cssText = B),
            (A.style.cssText = q),
            (e.style.cssText = q),
            e.appendChild(n),
            (p = n.offsetWidth),
            e.removeChild(n),
            (p = parseFloat(p, 10)),
            (A.style.cssText = i),
            (e.style.cssText = o);
        }
        return p || 16;
      }),
      (T.calcListLength = function (e) {
        if (!(e in X) || I.uT) {
          var t,
            n,
            o,
            r,
            s,
            a,
            l = i(e).split(/\s*,\s*/),
            c = !1;
          for (
            s = 0, a = l.length;
            a > s &&
            ((t = l[s]),
            (o = (n = T.parseSize(t)).length),
            (r = n.media),
            !o || !T.matchesMedia(r) || !1 === (c = T.calcLength(o)));
            s++
          );
          X[e] = c || G.width;
        }
        return X[e];
      }),
      (T.setRes = function (e) {
        var t;
        if (e)
          for (var n = 0, i = (t = T.parseSet(e)).length; i > n; n++)
            te(t[n], e.sizes);
        return t;
      }),
      (T.setRes.res = te),
      (T.applySetCandidate = function (e, t) {
        if (e.length) {
          var n,
            i,
            p,
            f,
            h,
            g,
            v,
            y,
            b,
            w,
            x,
            C,
            E,
            k = t[T.ns],
            _ = m,
            S = c,
            N = d;
          if (
            ((y = k.curSrc || t[M]),
            (b =
              k.curCan ||
              ((D = t),
              (O = y),
              !(L = e[0].set) &&
                O &&
                (L = (L = D[T.ns].sets) && L[L.length - 1]),
              (j = r(O, L)) &&
                ((O = T.makeUrl(O)),
                (D[T.ns].curSrc = O),
                (D[T.ns].curCan = j),
                j.res || te(j, j.set.sizes)),
              j)),
            (i = T.DPR),
            (E = b && b.res),
            !v &&
              y &&
              ((C = P && !t.complete && b && E > i) ||
                (b && !(u > E)) ||
                (b &&
                  i > E &&
                  E > s &&
                  (a > E && ((S *= 0.87), (N += 0.04 * i)),
                  (b.res += S * Math.pow(E - N, 2))),
                (w = !k.pic || (b && b.set == e[0].set)),
                b && w && b.res >= i && (v = b))),
            !v)
          )
            for (
              E && (b.res = b.res - (b.res - E) / 2),
                e.sort(o),
                v = e[(g = e.length) - 1],
                p = 0;
              g > p;
              p++
            )
              if ((n = e[p]).res >= i) {
                v =
                  e[(f = p - 1)] &&
                  (h = n.res - i) &&
                  (C || y != T.makeUrl(n.url)) &&
                  ((A = e[f].res),
                  ($ = i),
                  (I = void 0),
                  (I = h * Math.pow(A - 0.3, 1.9)),
                  l || (I /= 1.3),
                  (A += I) > $)
                    ? e[f]
                    : n;
                break;
              }
          return (
            E && (b.res = E),
            v &&
              ((x = T.makeUrl(v.url)),
              (k.curSrc = x),
              (k.curCan = v),
              x != y && T.setSrc(t, v),
              T.setSize(t)),
            _
          );
        }
        var A, $, I, D, O, L, j;
      }),
      (T.setSrc = function (e, t) {
        var n;
        (e.src = t.url),
          L &&
            ((n = e.style.zoom), (e.style.zoom = "0.999"), (e.style.zoom = n));
      }),
      (T.getSet = function (e) {
        var t,
          n,
          i,
          o = !1,
          r = e[T.ns].sets;
        for (t = 0; t < r.length && !o; t++)
          if (
            (n = r[t]).srcset &&
            T.matchesMedia(n.media) &&
            (i = T.supportsType(n.type))
          ) {
            "pending" == i && (n = i), (o = n);
            break;
          }
        return o;
      }),
      (T.parseSets = function (e, t, i) {
        var o,
          s,
          a,
          l,
          c = "PICTURE" == t.nodeName.toUpperCase(),
          u = e[T.ns];
        (u.src === n || i.src) &&
          ((u.src = _.call(e, "src")),
          u.src ? S.call(e, D, u.src) : N.call(e, D)),
          (u.srcset === n || !T.supSrcset || e.srcset || i.srcset) &&
            ((o = _.call(e, "srcset")), (u.srcset = o), (l = !0)),
          (u.sets = []),
          c &&
            ((u.pic = !0),
            (function (e, t) {
              var n,
                i,
                o,
                r,
                s = e.getElementsByTagName("source");
              for (n = 0, i = s.length; i > n; n++)
                ((o = s[n])[T.ns] = !0),
                  (r = o.getAttribute("srcset")) &&
                    t.push({
                      srcset: r,
                      media: o.getAttribute("media"),
                      type: o.getAttribute("type"),
                      sizes: o.getAttribute("sizes"),
                    });
            })(t, u.sets)),
          u.srcset
            ? ((s = { srcset: u.srcset, sizes: _.call(e, "sizes") }),
              u.sets.push(s),
              (a = (f || u.src) && z.test(u.srcset || "")) ||
                !u.src ||
                r(u.src, s) ||
                s.has1x ||
                ((s.srcset += ", " + u.src),
                s.cands.push({ url: u.src, x: 1, set: s })))
            : u.src && u.sets.push({ srcset: u.src, sizes: null }),
          (u.curCan = null),
          (u.curSrc = n),
          (u.supported = !(c || (s && !T.supSrcset) || a)),
          l &&
            T.supSrcset &&
            !u.supported &&
            (o ? (S.call(e, O, o), (e.srcset = "")) : N.call(e, O)),
          u.supported &&
            !u.srcset &&
            ((!u.src && e.src) || e.src != T.makeUrl(u.src)) &&
            (null == u.src ? e.removeAttribute("src") : (e.src = u.src)),
          (u.parsed = !0);
      }),
      (T.fillImg = function (e, t) {
        var n,
          i,
          o,
          r,
          s,
          a,
          l = t.reselect || t.reevaluate;
        if ((e[T.ns] || (e[T.ns] = {}), (i = e[T.ns]), l || i.evaled != m)) {
          if (!i.parsed || t.reevaluate) {
            if (!(n = e.parentNode)) return;
            T.parseSets(e, n, t);
          }
          i.supported
            ? (i.evaled = m)
            : ((o = e),
              (a = !1),
              "pending" != (s = T.getSet(o)) &&
                ((a = m),
                s && ((r = T.setRes(s)), (a = T.applySetCandidate(r, o)))),
              (o[T.ns].evaled = a));
        }
      }),
      (T.setupRun = function (t) {
        var n;
        (!Y || U || Q != e.devicePixelRatio) &&
          ((U = !1),
          (Q = e.devicePixelRatio),
          (V = {}),
          (X = {}),
          (n = (Q || 1) * I.xQuant),
          I.uT ||
            ((I.maxX = Math.max(1.3, I.maxX)),
            (n = Math.min(n, I.maxX)),
            (T.DPR = n)),
          (G.width = Math.max(e.innerWidth || 0, A.clientWidth)),
          (G.height = Math.max(e.innerHeight || 0, A.clientHeight)),
          (G.vw = G.width / 100),
          (G.vh = G.height / 100),
          (G.em = T.getEmValue()),
          (G.rem = G.em),
          (c = (c = I.lazyFactor / 2) * n + c),
          (d = 0.2 + 0.1 * n),
          (s = 0.5 + 0.2 * n),
          (a = 0.5 + 0.25 * n),
          (u = n + 1.3),
          (l = G.width > G.height) || (c *= 0.9),
          P && (c *= 0.9),
          (m = [G.width, G.height, n].join("-")),
          t.elements || t.context || clearTimeout(h));
      }),
      e.HTMLPictureElement
        ? ((ne = E), (T.fillImg = E))
        : ((b = e.attachEvent ? /d$|^c/ : /d$|^c|^i/),
          (w = function () {
            var e = t.readyState || "";
            (C = setTimeout(w, "loading" == e ? 200 : 999)),
              t.body &&
                ((y = y || b.test(e)), T.fillImgs(), y && clearTimeout(C));
          }),
          (x = function () {
            T.fillImgs();
          }),
          (C = setTimeout(w, t.body ? 9 : 99)),
          Z(e, "resize", function () {
            clearTimeout(h), (U = !0), (h = setTimeout(x, 99));
          }),
          Z(t, "readystatechange", w)),
      (T.respimage = ne),
      (T.fillImgs = ne),
      (T.teardownRun = E),
      (ne._ = T),
      (e.respimage = ne),
      (e.respimgCFG = {
        ri: T,
        push: function (e) {
          var t = e.shift();
          "function" == typeof T[t]
            ? T[t].apply(T, e)
            : ((I[t] = e[0]), Y && T.fillImgs({ reselect: !0 }));
        },
      });
    for (; F && F.length; ) e.respimgCFG.push(F.shift());
  })(window, document),
  (function (e, t) {
    var n = (function (e, t) {
      "use strict";
      if (t.getElementsByClassName) {
        var n,
          i = t.documentElement,
          o = e.addEventListener,
          r = e.setTimeout,
          s = e.requestAnimationFrame || r,
          a = /^picture$/i,
          l = ["load", "error", "lazyincluded", "_lazyloaded"],
          c = function (e, t) {
            var n = new RegExp("(\\s|^)" + t + "(\\s|$)");
            return e.className.match(n) && n;
          },
          u = function (e, t) {
            c(e, t) || (e.className += " " + t);
          },
          d = function (e, t) {
            var n;
            (n = c(e, t)) && (e.className = e.className.replace(n, " "));
          },
          p = function (e, t, n) {
            var i = n ? "addEventListener" : "removeEventListener";
            n && p(e, t),
              l.forEach(function (n) {
                e[i](n, t);
              });
          },
          f = function (e, n, i, o, r) {
            var s = t.createEvent("CustomEvent");
            return (
              s.initCustomEvent(n, !o, !r, i),
              (s.details = s.detail),
              e.dispatchEvent(s),
              s
            );
          },
          h = function (t, i) {
            var o;
            e.HTMLPictureElement ||
              ((o = e.picturefill || e.respimage || n.pf)
                ? o({ reevaluate: !0, reparse: !0, elements: [t] })
                : i && i.src && (t.src = i.src));
          },
          m = function (e, t) {
            return getComputedStyle(e, null)[t];
          },
          g = function (e, t, i) {
            for (
              i = i || e.offsetWidth;
              i < n.minSize && t && !e._lazysizesWidth;

            )
              (i = t.offsetWidth), (t = t.parentNode);
            return i;
          },
          v = function (t) {
            var i,
              o = 0,
              a = e.Date,
              l = function () {
                (i = !1), (o = a.now()), t();
              },
              c = function () {
                r(l);
              },
              u = function () {
                s(c);
              };
            return function () {
              if (!i) {
                var e = n.throttle - (a.now() - o);
                (i = !0), 9 > e && (e = 9), r(u, e);
              }
            };
          },
          y =
            ((R = /^img$/i),
            (W = /^iframe$/i),
            (F = "onscroll" in e && !/glebot/.test(navigator.userAgent)),
            (B = 0),
            (q = 0),
            (U = 1),
            (V = function (e) {
              q--,
                e && e.target && p(e.target, V),
                (!e || 0 > q || !e.target) && (q = 0);
            }),
            (X = function (e, t) {
              var n,
                i = e,
                o = "hidden" != m(e, "visibility");
              for (I -= t, L += t, D -= t, O += t; o && (i = i.offsetParent); )
                (o = (m(i, "opacity") || 1) > 0) &&
                  "visible" != m(i, "overflow") &&
                  ((n = i.getBoundingClientRect()),
                  (o =
                    O > n.left &&
                    D < n.right &&
                    L > n.top - 1 &&
                    I < n.bottom + 1));
              return o;
            }),
            (Q = v(function () {
              var e, t, i, o, r, s, a, l, c;
              if ((N = n.loadMode) && 8 > q && (e = E.length)) {
                for (
                  t = 0,
                    U++,
                    P > B && 1 > q && U > 3 && N > 2
                      ? ((B = P), (U = 0))
                      : (B = B != j && N > 1 && U > 2 && 6 > q ? j : 0);
                  e > t;
                  t++
                )
                  E[t] &&
                    !E[t]._lazyRace &&
                    (F
                      ? (((l = E[t].getAttribute("data-expand")) &&
                          (s = 1 * l)) ||
                          (s = B),
                        c !== s &&
                          ((A = innerWidth + s),
                          ($ = innerHeight + s),
                          (a = -1 * s),
                          (c = s)),
                        (i = E[t].getBoundingClientRect()),
                        (L = i.bottom) >= a &&
                        (I = i.top) <= $ &&
                        (O = i.right) >= a &&
                        (D = i.left) <= A &&
                        (L || O || D || I) &&
                        ((_ && 3 > q && 4 > U && !l && N > 2) || X(E[t], s))
                          ? (Y(E[t], !1, i.width), (r = !0))
                          : !r &&
                            _ &&
                            !o &&
                            3 > q &&
                            4 > U &&
                            N > 2 &&
                            (k[0] || n.preloadAfterLoad) &&
                            (k[0] ||
                              (!l &&
                                (L ||
                                  O ||
                                  D ||
                                  I ||
                                  "auto" != E[t].getAttribute(n.sizesAttr)))) &&
                            (o = k[0] || E[t]))
                      : Y(E[t]));
                o && !r && Y(o);
              }
            })),
            (G = function (e) {
              u(e.target, n.loadedClass),
                d(e.target, n.loadingClass),
                p(e.target, G);
            }),
            (z = []),
            (H = function () {
              for (; z.length; ) z.shift()();
              M = !1;
            }),
            (K = function (e) {
              z.push(e), M || ((M = !0), s(H));
            }),
            (Z = function () {
              var e,
                t = function () {
                  (n.loadMode = 3), Q();
                };
              (_ = !0),
                (U += 8),
                (n.loadMode = 3),
                o(
                  "scroll",
                  function () {
                    3 == n.loadMode && (n.loadMode = 2),
                      clearTimeout(e),
                      (e = r(t, 99));
                  },
                  !0
                );
            }),
            {
              _: function () {
                (E = t.getElementsByClassName(n.lazyClass)),
                  (k = t.getElementsByClassName(
                    n.lazyClass + " " + n.preloadClass
                  )),
                  (j = n.expand),
                  (P = Math.round(j * n.expFactor)),
                  o("scroll", Q, !0),
                  o("resize", Q, !0),
                  e.MutationObserver
                    ? new MutationObserver(Q).observe(i, {
                        childList: !0,
                        subtree: !0,
                        attributes: !0,
                      })
                    : (i.addEventListener("DOMNodeInserted", Q, !0),
                      i.addEventListener("DOMAttrModified", Q, !0),
                      setInterval(Q, 999)),
                  o("hashchange", Q, !0),
                  [
                    "focus",
                    "mouseover",
                    "click",
                    "load",
                    "transitionend",
                    "animationend",
                    "webkitAnimationEnd",
                  ].forEach(function (e) {
                    t.addEventListener(e, Q, !0);
                  }),
                  (_ = /d$|^c/.test(t.readyState))
                    ? Z()
                    : (o("load", Z), t.addEventListener("DOMContentLoaded", Q)),
                  Q();
              },
              checkElems: Q,
              unveil: (Y = function (e, t, i) {
                var o,
                  s,
                  l,
                  m,
                  g,
                  v,
                  y,
                  w,
                  x,
                  C,
                  T,
                  E = e.currentSrc || e.src,
                  k = R.test(e.nodeName),
                  N = e.getAttribute(n.sizesAttr) || e.getAttribute("sizes"),
                  A = "auto" == N;
                ((!A && _) || !k || !E || e.complete || c(e, n.errorClass)) &&
                  ((e._lazyRace = !0),
                  q++,
                  K(function () {
                    if (
                      (e._lazyRace && delete e._lazyRace,
                      d(e, n.lazyClass),
                      !(x = f(e, "lazybeforeunveil", { force: !!t }))
                        .defaultPrevented)
                    ) {
                      if (
                        (N &&
                          (A
                            ? (b.updateElem(e, !0, i), u(e, n.autosizesClass))
                            : e.setAttribute("sizes", N)),
                        (v = e.getAttribute(n.srcsetAttr)),
                        (g = e.getAttribute(n.srcAttr)),
                        k &&
                          ((y = e.parentNode),
                          (w = y && a.test(y.nodeName || ""))),
                        (C =
                          x.detail.firesLoad || ("src" in e && (v || g || w))),
                        (x = { target: e }),
                        C &&
                          (p(e, V, !0),
                          clearTimeout(S),
                          (S = r(V, 2500)),
                          u(e, n.loadingClass),
                          p(e, G, !0)),
                        w)
                      )
                        for (
                          o = y.getElementsByTagName("source"),
                            s = 0,
                            l = o.length;
                          l > s;
                          s++
                        )
                          (T =
                            n.customMedia[
                              o[s].getAttribute("data-media") ||
                                o[s].getAttribute("media")
                            ]) && o[s].setAttribute("media", T),
                            (m = o[s].getAttribute(n.srcsetAttr)) &&
                              o[s].setAttribute("srcset", m);
                      v
                        ? e.setAttribute("srcset", v)
                        : g &&
                          (W.test(e.nodeName)
                            ? (function (e, t) {
                                try {
                                  e.contentWindow.location.replace(t);
                                } catch (n) {
                                  e.setAttribute("src", t);
                                }
                              })(e, g)
                            : e.setAttribute("src", g)),
                        (v || w) && h(e, { src: g });
                    }
                    (!C || (e.complete && E == (e.currentSrc || e.src))) &&
                      (C ? V(x) : q--, G(x));
                  }));
              }),
            }),
          b =
            ((C = function (e, t, n) {
              var i,
                o,
                r,
                s,
                l = e.parentNode;
              if (
                l &&
                ((n = g(e, l, n)),
                !(s = f(e, "lazybeforesizes", { width: n, dataAttr: !!t }))
                  .defaultPrevented &&
                  (n = s.detail.width) &&
                  n !== e._lazysizesWidth)
              ) {
                if (
                  ((e._lazysizesWidth = n),
                  (n += "px"),
                  e.setAttribute("sizes", n),
                  a.test(l.nodeName || ""))
                )
                  for (
                    o = 0, r = (i = l.getElementsByTagName("source")).length;
                    r > o;
                    o++
                  )
                    i[o].setAttribute("sizes", n);
                s.detail.dataAttr || h(e, s.detail);
              }
            }),
            {
              _: function () {
                (x = t.getElementsByClassName(n.autosizesClass)),
                  o("resize", T);
              },
              checkElems: (T = v(function () {
                var e,
                  t = x.length;
                if (t) for (e = 0; t > e; e++) C(x[e]);
              })),
              updateElem: C,
            }),
          w = function () {
            w.i || ((w.i = !0), b._(), y._());
          };
        return (
          (function () {
            var t,
              i = {
                lazyClass: "lazyload",
                loadedClass: "lazyloaded",
                loadingClass: "lazyloading",
                preloadClass: "lazypreload",
                errorClass: "lazyerror",
                autosizesClass: "lazyautosizes",
                srcAttr: "data-src",
                srcsetAttr: "data-srcset",
                sizesAttr: "data-sizes",
                minSize: 40,
                customMedia: {},
                init: !0,
                expFactor: 2,
                expand: 359,
                loadMode: 2,
                throttle: 125,
              };
            for (t in ((n = e.lazySizesConfig || e.lazysizesConfig || {}), i))
              t in n || (n[t] = i[t]);
            (e.lazySizesConfig = n),
              r(function () {
                n.init && w();
              });
          })(),
          {
            cfg: n,
            autoSizer: b,
            loader: y,
            init: w,
            uP: h,
            aC: u,
            rC: d,
            hC: c,
            fire: f,
            gW: g,
          }
        );
      }
      var x,
        C,
        T,
        E,
        k,
        _,
        S,
        N,
        A,
        $,
        I,
        D,
        O,
        L,
        j,
        P,
        M,
        z,
        H,
        R,
        W,
        F,
        B,
        q,
        U,
        V,
        X,
        Q,
        G,
        K,
        Y,
        Z;
    })(e, e.document);
    (e.lazySizes = n),
      "object" == typeof module && module.exports
        ? (module.exports = n)
        : "function" == typeof define && define.amd && define(n);
  })(window),
  (function (e) {
    "function" == typeof define && define.amd
      ? define(["jquery"], e)
      : e(jQuery);
  })(function (e) {
    (e.ui = e.ui || {}), (e.ui.version = "1.12.1");
    var t,
      n,
      i = 0,
      o = Array.prototype.slice;
    (e.cleanData =
      ((n = e.cleanData),
      function (t) {
        var i, o, r;
        for (r = 0; null != (o = t[r]); r++)
          try {
            (i = e._data(o, "events")) &&
              i.remove &&
              e(o).triggerHandler("remove");
          } catch (e) {}
        n(t);
      })),
      (e.widget = function (t, n, i) {
        var o,
          r,
          s,
          a = {},
          l = t.split(".")[0],
          c = l + "-" + (t = t.split(".")[1]);
        return (
          i || ((i = n), (n = e.Widget)),
          e.isArray(i) && (i = e.extend.apply(null, [{}].concat(i))),
          (e.expr[":"][c.toLowerCase()] = function (t) {
            return !!e.data(t, c);
          }),
          (e[l] = e[l] || {}),
          (o = e[l][t]),
          (r = e[l][t] =
            function (e, t) {
              return this._createWidget
                ? void (arguments.length && this._createWidget(e, t))
                : new r(e, t);
            }),
          e.extend(r, o, {
            version: i.version,
            _proto: e.extend({}, i),
            _childConstructors: [],
          }),
          ((s = new n()).options = e.widget.extend({}, s.options)),
          e.each(i, function (t, i) {
            return e.isFunction(i)
              ? void (a[t] = (function () {
                  function e() {
                    return n.prototype[t].apply(this, arguments);
                  }
                  function o(e) {
                    return n.prototype[t].apply(this, e);
                  }
                  return function () {
                    var t,
                      n = this._super,
                      r = this._superApply;
                    return (
                      (this._super = e),
                      (this._superApply = o),
                      (t = i.apply(this, arguments)),
                      (this._super = n),
                      (this._superApply = r),
                      t
                    );
                  };
                })())
              : void (a[t] = i);
          }),
          (r.prototype = e.widget.extend(
            s,
            { widgetEventPrefix: (o && s.widgetEventPrefix) || t },
            a,
            { constructor: r, namespace: l, widgetName: t, widgetFullName: c }
          )),
          o
            ? (e.each(o._childConstructors, function (t, n) {
                var i = n.prototype;
                e.widget(i.namespace + "." + i.widgetName, r, n._proto);
              }),
              delete o._childConstructors)
            : n._childConstructors.push(r),
          e.widget.bridge(t, r),
          r
        );
      }),
      (e.widget.extend = function (t) {
        for (
          var n, i, r = o.call(arguments, 1), s = 0, a = r.length;
          a > s;
          s++
        )
          for (n in r[s])
            (i = r[s][n]),
              r[s].hasOwnProperty(n) &&
                void 0 !== i &&
                (t[n] = e.isPlainObject(i)
                  ? e.isPlainObject(t[n])
                    ? e.widget.extend({}, t[n], i)
                    : e.widget.extend({}, i)
                  : i);
        return t;
      }),
      (e.widget.bridge = function (t, n) {
        var i = n.prototype.widgetFullName || t;
        e.fn[t] = function (r) {
          var s = "string" == typeof r,
            a = o.call(arguments, 1),
            l = this;
          return (
            s
              ? this.length || "instance" !== r
                ? this.each(function () {
                    var n,
                      o = e.data(this, i);
                    return "instance" === r
                      ? ((l = o), !1)
                      : o
                      ? e.isFunction(o[r]) && "_" !== r.charAt(0)
                        ? (n = o[r].apply(o, a)) !== o && void 0 !== n
                          ? ((l = n && n.jquery ? l.pushStack(n.get()) : n), !1)
                          : void 0
                        : e.error(
                            "no such method '" +
                              r +
                              "' for " +
                              t +
                              " widget instance"
                          )
                      : e.error(
                          "cannot call methods on " +
                            t +
                            " prior to initialization; attempted to call method '" +
                            r +
                            "'"
                        );
                  })
                : (l = void 0)
              : (a.length && (r = e.widget.extend.apply(null, [r].concat(a))),
                this.each(function () {
                  var t = e.data(this, i);
                  t
                    ? (t.option(r || {}), t._init && t._init())
                    : e.data(this, i, new n(r, this));
                })),
            l
          );
        };
      }),
      (e.Widget = function () {}),
      (e.Widget._childConstructors = []),
      (e.Widget.prototype = {
        widgetName: "widget",
        widgetEventPrefix: "",
        defaultElement: "<div>",
        options: { classes: {}, disabled: !1, create: null },
        _createWidget: function (t, n) {
          (n = e(n || this.defaultElement || this)[0]),
            (this.element = e(n)),
            (this.uuid = i++),
            (this.eventNamespace = "." + this.widgetName + this.uuid),
            (this.bindings = e()),
            (this.hoverable = e()),
            (this.focusable = e()),
            (this.classesElementLookup = {}),
            n !== this &&
              (e.data(n, this.widgetFullName, this),
              this._on(!0, this.element, {
                remove: function (e) {
                  e.target === n && this.destroy();
                },
              }),
              (this.document = e(n.style ? n.ownerDocument : n.document || n)),
              (this.window = e(
                this.document[0].defaultView || this.document[0].parentWindow
              ))),
            (this.options = e.widget.extend(
              {},
              this.options,
              this._getCreateOptions(),
              t
            )),
            this._create(),
            this.options.disabled &&
              this._setOptionDisabled(this.options.disabled),
            this._trigger("create", null, this._getCreateEventData()),
            this._init();
        },
        _getCreateOptions: function () {
          return {};
        },
        _getCreateEventData: e.noop,
        _create: e.noop,
        _init: e.noop,
        destroy: function () {
          var t = this;
          this._destroy(),
            e.each(this.classesElementLookup, function (e, n) {
              t._removeClass(n, e);
            }),
            this.element
              .off(this.eventNamespace)
              .removeData(this.widgetFullName),
            this.widget().off(this.eventNamespace).removeAttr("aria-disabled"),
            this.bindings.off(this.eventNamespace);
        },
        _destroy: e.noop,
        widget: function () {
          return this.element;
        },
        option: function (t, n) {
          var i,
            o,
            r,
            s = t;
          if (0 === arguments.length) return e.widget.extend({}, this.options);
          if ("string" == typeof t)
            if (((s = {}), (t = (i = t.split(".")).shift()), i.length)) {
              for (
                o = s[t] = e.widget.extend({}, this.options[t]), r = 0;
                i.length - 1 > r;
                r++
              )
                (o[i[r]] = o[i[r]] || {}), (o = o[i[r]]);
              if (((t = i.pop()), 1 === arguments.length))
                return void 0 === o[t] ? null : o[t];
              o[t] = n;
            } else {
              if (1 === arguments.length)
                return void 0 === this.options[t] ? null : this.options[t];
              s[t] = n;
            }
          return this._setOptions(s), this;
        },
        _setOptions: function (e) {
          var t;
          for (t in e) this._setOption(t, e[t]);
          return this;
        },
        _setOption: function (e, t) {
          return (
            "classes" === e && this._setOptionClasses(t),
            (this.options[e] = t),
            "disabled" === e && this._setOptionDisabled(t),
            this
          );
        },
        _setOptionClasses: function (t) {
          var n, i, o;
          for (n in t)
            (o = this.classesElementLookup[n]),
              t[n] !== this.options.classes[n] &&
                o &&
                o.length &&
                ((i = e(o.get())),
                this._removeClass(o, n),
                i.addClass(
                  this._classes({ element: i, keys: n, classes: t, add: !0 })
                ));
        },
        _setOptionDisabled: function (e) {
          this._toggleClass(
            this.widget(),
            this.widgetFullName + "-disabled",
            null,
            !!e
          ),
            e &&
              (this._removeClass(this.hoverable, null, "ui-state-hover"),
              this._removeClass(this.focusable, null, "ui-state-focus"));
        },
        enable: function () {
          return this._setOptions({ disabled: !1 });
        },
        disable: function () {
          return this._setOptions({ disabled: !0 });
        },
        _classes: function (t) {
          function n(n, r) {
            var s, a;
            for (a = 0; n.length > a; a++)
              (s = o.classesElementLookup[n[a]] || e()),
                (s = t.add
                  ? e(e.unique(s.get().concat(t.element.get())))
                  : e(s.not(t.element).get())),
                (o.classesElementLookup[n[a]] = s),
                i.push(n[a]),
                r && t.classes[n[a]] && i.push(t.classes[n[a]]);
          }
          var i = [],
            o = this;
          return (
            (t = e.extend(
              { element: this.element, classes: this.options.classes || {} },
              t
            )),
            this._on(t.element, { remove: "_untrackClassesElement" }),
            t.keys && n(t.keys.match(/\S+/g) || [], !0),
            t.extra && n(t.extra.match(/\S+/g) || []),
            i.join(" ")
          );
        },
        _untrackClassesElement: function (t) {
          var n = this;
          e.each(n.classesElementLookup, function (i, o) {
            -1 !== e.inArray(t.target, o) &&
              (n.classesElementLookup[i] = e(o.not(t.target).get()));
          });
        },
        _removeClass: function (e, t, n) {
          return this._toggleClass(e, t, n, !1);
        },
        _addClass: function (e, t, n) {
          return this._toggleClass(e, t, n, !0);
        },
        _toggleClass: function (e, t, n, i) {
          i = "boolean" == typeof i ? i : n;
          var o = "string" == typeof e || null === e,
            r = {
              extra: o ? t : n,
              keys: o ? e : t,
              element: o ? this.element : e,
              add: i,
            };
          return r.element.toggleClass(this._classes(r), i), this;
        },
        _on: function (t, n, i) {
          var o,
            r = this;
          "boolean" != typeof t && ((i = n), (n = t), (t = !1)),
            i
              ? ((n = o = e(n)), (this.bindings = this.bindings.add(n)))
              : ((i = n), (n = this.element), (o = this.widget())),
            e.each(i, function (i, s) {
              function a() {
                return t ||
                  (!0 !== r.options.disabled &&
                    !e(this).hasClass("ui-state-disabled"))
                  ? ("string" == typeof s ? r[s] : s).apply(r, arguments)
                  : void 0;
              }
              "string" != typeof s &&
                (a.guid = s.guid = s.guid || a.guid || e.guid++);
              var l = i.match(/^([\w:-]*)\s*(.*)$/),
                c = l[1] + r.eventNamespace,
                u = l[2];
              u ? o.on(c, u, a) : n.on(c, a);
            });
        },
        _off: function (t, n) {
          (n =
            (n || "").split(" ").join(this.eventNamespace + " ") +
            this.eventNamespace),
            t.off(n).off(n),
            (this.bindings = e(this.bindings.not(t).get())),
            (this.focusable = e(this.focusable.not(t).get())),
            (this.hoverable = e(this.hoverable.not(t).get()));
        },
        _delay: function (e, t) {
          var n = this;
          return setTimeout(function () {
            return ("string" == typeof e ? n[e] : e).apply(n, arguments);
          }, t || 0);
        },
        _hoverable: function (t) {
          (this.hoverable = this.hoverable.add(t)),
            this._on(t, {
              mouseenter: function (t) {
                this._addClass(e(t.currentTarget), null, "ui-state-hover");
              },
              mouseleave: function (t) {
                this._removeClass(e(t.currentTarget), null, "ui-state-hover");
              },
            });
        },
        _focusable: function (t) {
          (this.focusable = this.focusable.add(t)),
            this._on(t, {
              focusin: function (t) {
                this._addClass(e(t.currentTarget), null, "ui-state-focus");
              },
              focusout: function (t) {
                this._removeClass(e(t.currentTarget), null, "ui-state-focus");
              },
            });
        },
        _trigger: function (t, n, i) {
          var o,
            r,
            s = this.options[t];
          if (
            ((i = i || {}),
            ((n = e.Event(n)).type = (
              t === this.widgetEventPrefix ? t : this.widgetEventPrefix + t
            ).toLowerCase()),
            (n.target = this.element[0]),
            (r = n.originalEvent))
          )
            for (o in r) o in n || (n[o] = r[o]);
          return (
            this.element.trigger(n, i),
            !(
              (e.isFunction(s) &&
                !1 === s.apply(this.element[0], [n].concat(i))) ||
              n.isDefaultPrevented()
            )
          );
        },
      }),
      e.each({ show: "fadeIn", hide: "fadeOut" }, function (t, n) {
        e.Widget.prototype["_" + t] = function (i, o, r) {
          "string" == typeof o && (o = { effect: o });
          var s,
            a = o ? (!0 === o || "number" == typeof o ? n : o.effect || n) : t;
          "number" == typeof (o = o || {}) && (o = { duration: o }),
            (s = !e.isEmptyObject(o)),
            (o.complete = r),
            o.delay && i.delay(o.delay),
            s && e.effects && e.effects.effect[a]
              ? i[t](o)
              : a !== t && i[a]
              ? i[a](o.duration, o.easing, r)
              : i.queue(function (n) {
                  e(this)[t](), r && r.call(i[0]), n();
                });
        };
      }),
      e.widget,
      (function () {
        function t(e, t, n) {
          return [
            parseFloat(e[0]) * (u.test(e[0]) ? t / 100 : 1),
            parseFloat(e[1]) * (u.test(e[1]) ? n / 100 : 1),
          ];
        }
        function n(t, n) {
          return parseInt(e.css(t, n), 10) || 0;
        }
        var i,
          o = Math.max,
          r = Math.abs,
          s = /left|center|right/,
          a = /top|center|bottom/,
          l = /[\+\-]\d+(\.[\d]+)?%?/,
          c = /^\w+/,
          u = /%$/,
          d = e.fn.position;
        (e.position = {
          scrollbarWidth: function () {
            if (void 0 !== i) return i;
            var t,
              n,
              o = e(
                "<div style='display:block;position:absolute;width:50px;height:50px;overflow:hidden;'><div style='height:100px;width:auto;'></div></div>"
              ),
              r = o.children()[0];
            return (
              e("body").append(o),
              (t = r.offsetWidth),
              o.css("overflow", "scroll"),
              t === (n = r.offsetWidth) && (n = o[0].clientWidth),
              o.remove(),
              (i = t - n)
            );
          },
          getScrollInfo: function (t) {
            var n =
                t.isWindow || t.isDocument ? "" : t.element.css("overflow-x"),
              i = t.isWindow || t.isDocument ? "" : t.element.css("overflow-y"),
              o =
                "scroll" === n ||
                ("auto" === n && t.width < t.element[0].scrollWidth);
            return {
              width:
                "scroll" === i ||
                ("auto" === i && t.height < t.element[0].scrollHeight)
                  ? e.position.scrollbarWidth()
                  : 0,
              height: o ? e.position.scrollbarWidth() : 0,
            };
          },
          getWithinInfo: function (t) {
            var n = e(t || window),
              i = e.isWindow(n[0]),
              o = !!n[0] && 9 === n[0].nodeType;
            return {
              element: n,
              isWindow: i,
              isDocument: o,
              offset: i || o ? { left: 0, top: 0 } : e(t).offset(),
              scrollLeft: n.scrollLeft(),
              scrollTop: n.scrollTop(),
              width: n.outerWidth(),
              height: n.outerHeight(),
            };
          },
        }),
          (e.fn.position = function (i) {
            if (!i || !i.of) return d.apply(this, arguments);
            i = e.extend({}, i);
            var u,
              p,
              f,
              h,
              m,
              g,
              v,
              y,
              b = e(i.of),
              w = e.position.getWithinInfo(i.within),
              x = e.position.getScrollInfo(w),
              C = (i.collision || "flip").split(" "),
              T = {};
            return (
              (g =
                9 === (y = (v = b)[0]).nodeType
                  ? {
                      width: v.width(),
                      height: v.height(),
                      offset: { top: 0, left: 0 },
                    }
                  : e.isWindow(y)
                  ? {
                      width: v.width(),
                      height: v.height(),
                      offset: { top: v.scrollTop(), left: v.scrollLeft() },
                    }
                  : y.preventDefault
                  ? {
                      width: 0,
                      height: 0,
                      offset: { top: y.pageY, left: y.pageX },
                    }
                  : {
                      width: v.outerWidth(),
                      height: v.outerHeight(),
                      offset: v.offset(),
                    }),
              b[0].preventDefault && (i.at = "left top"),
              (p = g.width),
              (f = g.height),
              (h = g.offset),
              (m = e.extend({}, h)),
              e.each(["my", "at"], function () {
                var e,
                  t,
                  n = (i[this] || "").split(" ");
                1 === n.length &&
                  (n = s.test(n[0])
                    ? n.concat(["center"])
                    : a.test(n[0])
                    ? ["center"].concat(n)
                    : ["center", "center"]),
                  (n[0] = s.test(n[0]) ? n[0] : "center"),
                  (n[1] = a.test(n[1]) ? n[1] : "center"),
                  (e = l.exec(n[0])),
                  (t = l.exec(n[1])),
                  (T[this] = [e ? e[0] : 0, t ? t[0] : 0]),
                  (i[this] = [c.exec(n[0])[0], c.exec(n[1])[0]]);
              }),
              1 === C.length && (C[1] = C[0]),
              "right" === i.at[0]
                ? (m.left += p)
                : "center" === i.at[0] && (m.left += p / 2),
              "bottom" === i.at[1]
                ? (m.top += f)
                : "center" === i.at[1] && (m.top += f / 2),
              (u = t(T.at, p, f)),
              (m.left += u[0]),
              (m.top += u[1]),
              this.each(function () {
                var s,
                  a,
                  l = e(this),
                  c = l.outerWidth(),
                  d = l.outerHeight(),
                  g = n(this, "marginLeft"),
                  v = n(this, "marginTop"),
                  y = c + g + n(this, "marginRight") + x.width,
                  E = d + v + n(this, "marginBottom") + x.height,
                  k = e.extend({}, m),
                  _ = t(T.my, l.outerWidth(), l.outerHeight());
                "right" === i.my[0]
                  ? (k.left -= c)
                  : "center" === i.my[0] && (k.left -= c / 2),
                  "bottom" === i.my[1]
                    ? (k.top -= d)
                    : "center" === i.my[1] && (k.top -= d / 2),
                  (k.left += _[0]),
                  (k.top += _[1]),
                  (s = { marginLeft: g, marginTop: v }),
                  e.each(["left", "top"], function (t, n) {
                    e.ui.position[C[t]] &&
                      e.ui.position[C[t]][n](k, {
                        targetWidth: p,
                        targetHeight: f,
                        elemWidth: c,
                        elemHeight: d,
                        collisionPosition: s,
                        collisionWidth: y,
                        collisionHeight: E,
                        offset: [u[0] + _[0], u[1] + _[1]],
                        my: i.my,
                        at: i.at,
                        within: w,
                        elem: l,
                      });
                  }),
                  i.using &&
                    (a = function (e) {
                      var t = h.left - k.left,
                        n = t + p - c,
                        s = h.top - k.top,
                        a = s + f - d,
                        u = {
                          target: {
                            element: b,
                            left: h.left,
                            top: h.top,
                            width: p,
                            height: f,
                          },
                          element: {
                            element: l,
                            left: k.left,
                            top: k.top,
                            width: c,
                            height: d,
                          },
                          horizontal:
                            0 > n ? "left" : t > 0 ? "right" : "center",
                          vertical: 0 > a ? "top" : s > 0 ? "bottom" : "middle",
                        };
                      c > p && p > r(t + n) && (u.horizontal = "center"),
                        d > f && f > r(s + a) && (u.vertical = "middle"),
                        (u.important =
                          o(r(t), r(n)) > o(r(s), r(a))
                            ? "horizontal"
                            : "vertical"),
                        i.using.call(this, e, u);
                    }),
                  l.offset(e.extend(k, { using: a }));
              })
            );
          }),
          (e.ui.position = {
            fit: {
              left: function (e, t) {
                var n,
                  i = t.within,
                  r = i.isWindow ? i.scrollLeft : i.offset.left,
                  s = i.width,
                  a = e.left - t.collisionPosition.marginLeft,
                  l = r - a,
                  c = a + t.collisionWidth - s - r;
                t.collisionWidth > s
                  ? l > 0 && 0 >= c
                    ? ((n = e.left + l + t.collisionWidth - s - r),
                      (e.left += l - n))
                    : (e.left =
                        c > 0 && 0 >= l
                          ? r
                          : l > c
                          ? r + s - t.collisionWidth
                          : r)
                  : l > 0
                  ? (e.left += l)
                  : c > 0
                  ? (e.left -= c)
                  : (e.left = o(e.left - a, e.left));
              },
              top: function (e, t) {
                var n,
                  i = t.within,
                  r = i.isWindow ? i.scrollTop : i.offset.top,
                  s = t.within.height,
                  a = e.top - t.collisionPosition.marginTop,
                  l = r - a,
                  c = a + t.collisionHeight - s - r;
                t.collisionHeight > s
                  ? l > 0 && 0 >= c
                    ? ((n = e.top + l + t.collisionHeight - s - r),
                      (e.top += l - n))
                    : (e.top =
                        c > 0 && 0 >= l
                          ? r
                          : l > c
                          ? r + s - t.collisionHeight
                          : r)
                  : l > 0
                  ? (e.top += l)
                  : c > 0
                  ? (e.top -= c)
                  : (e.top = o(e.top - a, e.top));
              },
            },
            flip: {
              left: function (e, t) {
                var n,
                  i,
                  o = t.within,
                  s = o.offset.left + o.scrollLeft,
                  a = o.width,
                  l = o.isWindow ? o.scrollLeft : o.offset.left,
                  c = e.left - t.collisionPosition.marginLeft,
                  u = c - l,
                  d = c + t.collisionWidth - a - l,
                  p =
                    "left" === t.my[0]
                      ? -t.elemWidth
                      : "right" === t.my[0]
                      ? t.elemWidth
                      : 0,
                  f =
                    "left" === t.at[0]
                      ? t.targetWidth
                      : "right" === t.at[0]
                      ? -t.targetWidth
                      : 0,
                  h = -2 * t.offset[0];
                0 > u
                  ? (0 > (n = e.left + p + f + h + t.collisionWidth - a - s) ||
                      r(u) > n) &&
                    (e.left += p + f + h)
                  : d > 0 &&
                    ((i =
                      e.left - t.collisionPosition.marginLeft + p + f + h - l) >
                      0 ||
                      d > r(i)) &&
                    (e.left += p + f + h);
              },
              top: function (e, t) {
                var n,
                  i,
                  o = t.within,
                  s = o.offset.top + o.scrollTop,
                  a = o.height,
                  l = o.isWindow ? o.scrollTop : o.offset.top,
                  c = e.top - t.collisionPosition.marginTop,
                  u = c - l,
                  d = c + t.collisionHeight - a - l,
                  p =
                    "top" === t.my[1]
                      ? -t.elemHeight
                      : "bottom" === t.my[1]
                      ? t.elemHeight
                      : 0,
                  f =
                    "top" === t.at[1]
                      ? t.targetHeight
                      : "bottom" === t.at[1]
                      ? -t.targetHeight
                      : 0,
                  h = -2 * t.offset[1];
                0 > u
                  ? (0 > (i = e.top + p + f + h + t.collisionHeight - a - s) ||
                      r(u) > i) &&
                    (e.top += p + f + h)
                  : d > 0 &&
                    ((n =
                      e.top - t.collisionPosition.marginTop + p + f + h - l) >
                      0 ||
                      d > r(n)) &&
                    (e.top += p + f + h);
              },
            },
            flipfit: {
              left: function () {
                e.ui.position.flip.left.apply(this, arguments),
                  e.ui.position.fit.left.apply(this, arguments);
              },
              top: function () {
                e.ui.position.flip.top.apply(this, arguments),
                  e.ui.position.fit.top.apply(this, arguments);
              },
            },
          });
      })(),
      e.ui.position,
      (e.ui.keyCode = {
        BACKSPACE: 8,
        COMMA: 188,
        DELETE: 46,
        DOWN: 40,
        END: 35,
        ENTER: 13,
        ESCAPE: 27,
        HOME: 36,
        LEFT: 37,
        PAGE_DOWN: 34,
        PAGE_UP: 33,
        PERIOD: 190,
        RIGHT: 39,
        SPACE: 32,
        TAB: 9,
        UP: 38,
      }),
      e.fn.extend({
        uniqueId:
          ((t = 0),
          function () {
            return this.each(function () {
              this.id || (this.id = "ui-id-" + ++t);
            });
          }),
        removeUniqueId: function () {
          return this.each(function () {
            /^ui-id-\d+$/.test(this.id) && e(this).removeAttr("id");
          });
        },
      }),
      (e.ui.safeActiveElement = function (e) {
        var t;
        try {
          t = e.activeElement;
        } catch (n) {
          t = e.body;
        }
        return t || (t = e.body), t.nodeName || (t = e.body), t;
      }),
      e.widget("ui.menu", {
        version: "1.12.1",
        defaultElement: "<ul>",
        delay: 300,
        options: {
          icons: { submenu: "ui-icon-caret-1-e" },
          items: "> *",
          menus: "ul",
          position: { my: "left top", at: "right top" },
          role: "menu",
          blur: null,
          focus: null,
          select: null,
        },
        _create: function () {
          (this.activeMenu = this.element),
            (this.mouseHandled = !1),
            this.element
              .uniqueId()
              .attr({ role: this.options.role, tabIndex: 0 }),
            this._addClass("ui-menu", "ui-widget ui-widget-content"),
            this._on({
              "mousedown .ui-menu-item": function (e) {
                e.preventDefault();
              },
              "click .ui-menu-item": function (t) {
                var n = e(t.target),
                  i = e(e.ui.safeActiveElement(this.document[0]));
                !this.mouseHandled &&
                  n.not(".ui-state-disabled").length &&
                  (this.select(t),
                  t.isPropagationStopped() || (this.mouseHandled = !0),
                  n.has(".ui-menu").length
                    ? this.expand(t)
                    : !this.element.is(":focus") &&
                      i.closest(".ui-menu").length &&
                      (this.element.trigger("focus", [!0]),
                      this.active &&
                        1 === this.active.parents(".ui-menu").length &&
                        clearTimeout(this.timer)));
              },
              "mouseenter .ui-menu-item": function (t) {
                if (!this.previousFilter) {
                  var n = e(t.target).closest(".ui-menu-item"),
                    i = e(t.currentTarget);
                  n[0] === i[0] &&
                    (this._removeClass(
                      i.siblings().children(".ui-state-active"),
                      null,
                      "ui-state-active"
                    ),
                    this.focus(t, i));
                }
              },
              mouseleave: "collapseAll",
              "mouseleave .ui-menu": "collapseAll",
              focus: function (e, t) {
                var n =
                  this.active || this.element.find(this.options.items).eq(0);
                t || this.focus(e, n);
              },
              blur: function (t) {
                this._delay(function () {
                  !e.contains(
                    this.element[0],
                    e.ui.safeActiveElement(this.document[0])
                  ) && this.collapseAll(t);
                });
              },
              keydown: "_keydown",
            }),
            this.refresh(),
            this._on(this.document, {
              click: function (e) {
                this._closeOnDocumentClick(e) && this.collapseAll(e),
                  (this.mouseHandled = !1);
              },
            });
        },
        _destroy: function () {
          var t = this.element
            .find(".ui-menu-item")
            .removeAttr("role aria-disabled")
            .children(".ui-menu-item-wrapper")
            .removeUniqueId()
            .removeAttr("tabIndex role aria-haspopup");
          this.element
            .removeAttr("aria-activedescendant")
            .find(".ui-menu")
            .addBack()
            .removeAttr(
              "role aria-labelledby aria-expanded aria-hidden aria-disabled tabIndex"
            )
            .removeUniqueId()
            .show(),
            t.children().each(function () {
              var t = e(this);
              t.data("ui-menu-submenu-caret") && t.remove();
            });
        },
        _keydown: function (t) {
          var n,
            i,
            o,
            r,
            s = !0;
          switch (t.keyCode) {
            case e.ui.keyCode.PAGE_UP:
              this.previousPage(t);
              break;
            case e.ui.keyCode.PAGE_DOWN:
              this.nextPage(t);
              break;
            case e.ui.keyCode.HOME:
              this._move("first", "first", t);
              break;
            case e.ui.keyCode.END:
              this._move("last", "last", t);
              break;
            case e.ui.keyCode.UP:
              this.previous(t);
              break;
            case e.ui.keyCode.DOWN:
              this.next(t);
              break;
            case e.ui.keyCode.LEFT:
              this.collapse(t);
              break;
            case e.ui.keyCode.RIGHT:
              this.active &&
                !this.active.is(".ui-state-disabled") &&
                this.expand(t);
              break;
            case e.ui.keyCode.ENTER:
            case e.ui.keyCode.SPACE:
              this._activate(t);
              break;
            case e.ui.keyCode.ESCAPE:
              this.collapse(t);
              break;
            default:
              (s = !1),
                (i = this.previousFilter || ""),
                (r = !1),
                (o =
                  t.keyCode >= 96 && 105 >= t.keyCode
                    ? "" + (t.keyCode - 96)
                    : String.fromCharCode(t.keyCode)),
                clearTimeout(this.filterTimer),
                o === i ? (r = !0) : (o = i + o),
                (n = this._filterMenuItems(o)),
                (n =
                  r && -1 !== n.index(this.active.next())
                    ? this.active.nextAll(".ui-menu-item")
                    : n).length ||
                  ((o = String.fromCharCode(t.keyCode)),
                  (n = this._filterMenuItems(o))),
                n.length
                  ? (this.focus(t, n),
                    (this.previousFilter = o),
                    (this.filterTimer = this._delay(function () {
                      delete this.previousFilter;
                    }, 1e3)))
                  : delete this.previousFilter;
          }
          s && t.preventDefault();
        },
        _activate: function (e) {
          this.active &&
            !this.active.is(".ui-state-disabled") &&
            (this.active.children("[aria-haspopup='true']").length
              ? this.expand(e)
              : this.select(e));
        },
        refresh: function () {
          var t,
            n,
            i,
            o,
            r = this,
            s = this.options.icons.submenu,
            a = this.element.find(this.options.menus);
          this._toggleClass(
            "ui-menu-icons",
            null,
            !!this.element.find(".ui-icon").length
          ),
            (n = a
              .filter(":not(.ui-menu)")
              .hide()
              .attr({
                role: this.options.role,
                "aria-hidden": "true",
                "aria-expanded": "false",
              })
              .each(function () {
                var t = e(this),
                  n = t.prev(),
                  i = e("<span>").data("ui-menu-submenu-caret", !0);
                r._addClass(i, "ui-menu-icon", "ui-icon " + s),
                  n.attr("aria-haspopup", "true").prepend(i),
                  t.attr("aria-labelledby", n.attr("id"));
              })),
            this._addClass(
              n,
              "ui-menu",
              "ui-widget ui-widget-content ui-front"
            ),
            (t = a.add(this.element).find(this.options.items))
              .not(".ui-menu-item")
              .each(function () {
                var t = e(this);
                r._isDivider(t) &&
                  r._addClass(t, "ui-menu-divider", "ui-widget-content");
              }),
            (o = (i = t.not(".ui-menu-item, .ui-menu-divider"))
              .children()
              .not(".ui-menu")
              .uniqueId()
              .attr({ tabIndex: -1, role: this._itemRole() })),
            this._addClass(i, "ui-menu-item")._addClass(
              o,
              "ui-menu-item-wrapper"
            ),
            t.filter(".ui-state-disabled").attr("aria-disabled", "true"),
            this.active &&
              !e.contains(this.element[0], this.active[0]) &&
              this.blur();
        },
        _itemRole: function () {
          return { menu: "menuitem", listbox: "option" }[this.options.role];
        },
        _setOption: function (e, t) {
          if ("icons" === e) {
            var n = this.element.find(".ui-menu-icon");
            this._removeClass(n, null, this.options.icons.submenu)._addClass(
              n,
              null,
              t.submenu
            );
          }
          this._super(e, t);
        },
        _setOptionDisabled: function (e) {
          this._super(e),
            this.element.attr("aria-disabled", e + ""),
            this._toggleClass(null, "ui-state-disabled", !!e);
        },
        focus: function (e, t) {
          var n, i, o;
          this.blur(e, e && "focus" === e.type),
            this._scrollIntoView(t),
            (this.active = t.first()),
            (i = this.active.children(".ui-menu-item-wrapper")),
            this._addClass(i, null, "ui-state-active"),
            this.options.role &&
              this.element.attr("aria-activedescendant", i.attr("id")),
            (o = this.active
              .parent()
              .closest(".ui-menu-item")
              .children(".ui-menu-item-wrapper")),
            this._addClass(o, null, "ui-state-active"),
            e && "keydown" === e.type
              ? this._close()
              : (this.timer = this._delay(function () {
                  this._close();
                }, this.delay)),
            (n = t.children(".ui-menu")).length &&
              e &&
              /^mouse/.test(e.type) &&
              this._startOpening(n),
            (this.activeMenu = t.parent()),
            this._trigger("focus", e, { item: t });
        },
        _scrollIntoView: function (t) {
          var n, i, o, r, s, a;
          this._hasScroll() &&
            ((n = parseFloat(e.css(this.activeMenu[0], "borderTopWidth")) || 0),
            (i = parseFloat(e.css(this.activeMenu[0], "paddingTop")) || 0),
            (o = t.offset().top - this.activeMenu.offset().top - n - i),
            (r = this.activeMenu.scrollTop()),
            (s = this.activeMenu.height()),
            (a = t.outerHeight()),
            0 > o
              ? this.activeMenu.scrollTop(r + o)
              : o + a > s && this.activeMenu.scrollTop(r + o - s + a));
        },
        blur: function (e, t) {
          t || clearTimeout(this.timer),
            this.active &&
              (this._removeClass(
                this.active.children(".ui-menu-item-wrapper"),
                null,
                "ui-state-active"
              ),
              this._trigger("blur", e, { item: this.active }),
              (this.active = null));
        },
        _startOpening: function (e) {
          clearTimeout(this.timer),
            "true" === e.attr("aria-hidden") &&
              (this.timer = this._delay(function () {
                this._close(), this._open(e);
              }, this.delay));
        },
        _open: function (t) {
          var n = e.extend({ of: this.active }, this.options.position);
          clearTimeout(this.timer),
            this.element
              .find(".ui-menu")
              .not(t.parents(".ui-menu"))
              .hide()
              .attr("aria-hidden", "true"),
            t
              .show()
              .removeAttr("aria-hidden")
              .attr("aria-expanded", "true")
              .position(n);
        },
        collapseAll: function (t, n) {
          clearTimeout(this.timer),
            (this.timer = this._delay(function () {
              var i = n
                ? this.element
                : e(t && t.target).closest(this.element.find(".ui-menu"));
              i.length || (i = this.element),
                this._close(i),
                this.blur(t),
                this._removeClass(
                  i.find(".ui-state-active"),
                  null,
                  "ui-state-active"
                ),
                (this.activeMenu = i);
            }, this.delay));
        },
        _close: function (e) {
          e || (e = this.active ? this.active.parent() : this.element),
            e
              .find(".ui-menu")
              .hide()
              .attr("aria-hidden", "true")
              .attr("aria-expanded", "false");
        },
        _closeOnDocumentClick: function (t) {
          return !e(t.target).closest(".ui-menu").length;
        },
        _isDivider: function (e) {
          return !/[^\-\u2014\u2013\s]/.test(e.text());
        },
        collapse: function (e) {
          var t =
            this.active &&
            this.active.parent().closest(".ui-menu-item", this.element);
          t && t.length && (this._close(), this.focus(e, t));
        },
        expand: function (e) {
          var t =
            this.active &&
            this.active.children(".ui-menu ").find(this.options.items).first();
          t &&
            t.length &&
            (this._open(t.parent()),
            this._delay(function () {
              this.focus(e, t);
            }));
        },
        next: function (e) {
          this._move("next", "first", e);
        },
        previous: function (e) {
          this._move("prev", "last", e);
        },
        isFirstItem: function () {
          return this.active && !this.active.prevAll(".ui-menu-item").length;
        },
        isLastItem: function () {
          return this.active && !this.active.nextAll(".ui-menu-item").length;
        },
        _move: function (e, t, n) {
          var i;
          this.active &&
            (i =
              "first" === e || "last" === e
                ? this.active["first" === e ? "prevAll" : "nextAll"](
                    ".ui-menu-item"
                  ).eq(-1)
                : this.active[e + "All"](".ui-menu-item").eq(0)),
            (i && i.length && this.active) ||
              (i = this.activeMenu.find(this.options.items)[t]()),
            this.focus(n, i);
        },
        nextPage: function (t) {
          var n, i, o;
          return this.active
            ? void (
                this.isLastItem() ||
                (this._hasScroll()
                  ? ((i = this.active.offset().top),
                    (o = this.element.height()),
                    this.active.nextAll(".ui-menu-item").each(function () {
                      return 0 > (n = e(this)).offset().top - i - o;
                    }),
                    this.focus(t, n))
                  : this.focus(
                      t,
                      this.activeMenu
                        .find(this.options.items)
                        [this.active ? "last" : "first"]()
                    ))
              )
            : void this.next(t);
        },
        previousPage: function (t) {
          var n, i, o;
          return this.active
            ? void (
                this.isFirstItem() ||
                (this._hasScroll()
                  ? ((i = this.active.offset().top),
                    (o = this.element.height()),
                    this.active.prevAll(".ui-menu-item").each(function () {
                      return (n = e(this)).offset().top - i + o > 0;
                    }),
                    this.focus(t, n))
                  : this.focus(
                      t,
                      this.activeMenu.find(this.options.items).first()
                    ))
              )
            : void this.next(t);
        },
        _hasScroll: function () {
          return this.element.outerHeight() < this.element.prop("scrollHeight");
        },
        select: function (t) {
          this.active = this.active || e(t.target).closest(".ui-menu-item");
          var n = { item: this.active };
          this.active.has(".ui-menu").length || this.collapseAll(t, !0),
            this._trigger("select", t, n);
        },
        _filterMenuItems: function (t) {
          var n = t.replace(/[\-\[\]{}()*+?.,\\\^$|#\s]/g, "\\$&"),
            i = RegExp("^" + n, "i");
          return this.activeMenu
            .find(this.options.items)
            .filter(".ui-menu-item")
            .filter(function () {
              return i.test(
                e.trim(e(this).children(".ui-menu-item-wrapper").text())
              );
            });
        },
      }),
      e.widget("ui.autocomplete", {
        version: "1.12.1",
        defaultElement: "<input>",
        options: {
          appendTo: null,
          autoFocus: !1,
          delay: 300,
          minLength: 1,
          position: { my: "left top", at: "left bottom", collision: "none" },
          source: null,
          change: null,
          close: null,
          focus: null,
          open: null,
          response: null,
          search: null,
          select: null,
        },
        requestIndex: 0,
        pending: 0,
        _create: function () {
          var t,
            n,
            i,
            o = this.element[0].nodeName.toLowerCase(),
            r = "textarea" === o,
            s = "input" === o;
          (this.isMultiLine =
            r || (!s && this._isContentEditable(this.element))),
            (this.valueMethod = this.element[r || s ? "val" : "text"]),
            (this.isNewMenu = !0),
            this._addClass("ui-autocomplete-input"),
            this.element.attr("autocomplete", "off"),
            this._on(this.element, {
              keydown: function (o) {
                if (this.element.prop("readOnly"))
                  return (t = !0), (i = !0), void (n = !0);
                (t = !1), (i = !1), (n = !1);
                var r = e.ui.keyCode;
                switch (o.keyCode) {
                  case r.PAGE_UP:
                    (t = !0), this._move("previousPage", o);
                    break;
                  case r.PAGE_DOWN:
                    (t = !0), this._move("nextPage", o);
                    break;
                  case r.UP:
                    (t = !0), this._keyEvent("previous", o);
                    break;
                  case r.DOWN:
                    (t = !0), this._keyEvent("next", o);
                    break;
                  case r.ENTER:
                    this.menu.active &&
                      ((t = !0), o.preventDefault(), this.menu.select(o));
                    break;
                  case r.TAB:
                    this.menu.active && this.menu.select(o);
                    break;
                  case r.ESCAPE:
                    this.menu.element.is(":visible") &&
                      (this.isMultiLine || this._value(this.term),
                      this.close(o),
                      o.preventDefault());
                    break;
                  default:
                    (n = !0), this._searchTimeout(o);
                }
              },
              keypress: function (i) {
                if (t)
                  return (
                    (t = !1),
                    void (
                      (!this.isMultiLine || this.menu.element.is(":visible")) &&
                      i.preventDefault()
                    )
                  );
                if (!n) {
                  var o = e.ui.keyCode;
                  switch (i.keyCode) {
                    case o.PAGE_UP:
                      this._move("previousPage", i);
                      break;
                    case o.PAGE_DOWN:
                      this._move("nextPage", i);
                      break;
                    case o.UP:
                      this._keyEvent("previous", i);
                      break;
                    case o.DOWN:
                      this._keyEvent("next", i);
                  }
                }
              },
              input: function (e) {
                return i
                  ? ((i = !1), void e.preventDefault())
                  : void this._searchTimeout(e);
              },
              focus: function () {
                (this.selectedItem = null), (this.previous = this._value());
              },
              blur: function (e) {
                return this.cancelBlur
                  ? void delete this.cancelBlur
                  : (clearTimeout(this.searching),
                    this.close(e),
                    void this._change(e));
              },
            }),
            this._initSource(),
            (this.menu = e("<ul>")
              .appendTo(this._appendTo())
              .menu({ role: null })
              .hide()
              .menu("instance")),
            this._addClass(this.menu.element, "ui-autocomplete", "ui-front"),
            this._on(this.menu.element, {
              mousedown: function (t) {
                t.preventDefault(),
                  (this.cancelBlur = !0),
                  this._delay(function () {
                    delete this.cancelBlur,
                      this.element[0] !==
                        e.ui.safeActiveElement(this.document[0]) &&
                        this.element.trigger("focus");
                  });
              },
              menufocus: function (t, n) {
                var i, o;
                return this.isNewMenu &&
                  ((this.isNewMenu = !1),
                  t.originalEvent && /^mouse/.test(t.originalEvent.type))
                  ? (this.menu.blur(),
                    void this.document.one("mousemove", function () {
                      e(t.target).trigger(t.originalEvent);
                    }))
                  : ((o = n.item.data("ui-autocomplete-item")),
                    !1 !== this._trigger("focus", t, { item: o }) &&
                      t.originalEvent &&
                      /^key/.test(t.originalEvent.type) &&
                      this._value(o.value),
                    void (
                      (i = n.item.attr("aria-label") || o.value) &&
                      e.trim(i).length &&
                      (this.liveRegion.children().hide(),
                      e("<div>").text(i).appendTo(this.liveRegion))
                    ));
              },
              menuselect: function (t, n) {
                var i = n.item.data("ui-autocomplete-item"),
                  o = this.previous;
                this.element[0] !== e.ui.safeActiveElement(this.document[0]) &&
                  (this.element.trigger("focus"),
                  (this.previous = o),
                  this._delay(function () {
                    (this.previous = o), (this.selectedItem = i);
                  })),
                  !1 !== this._trigger("select", t, { item: i }) &&
                    this._value(i.value),
                  (this.term = this._value()),
                  this.close(t),
                  (this.selectedItem = i);
              },
            }),
            (this.liveRegion = e("<div>", {
              role: "status",
              "aria-live": "assertive",
              "aria-relevant": "additions",
            }).appendTo(this.document[0].body)),
            this._addClass(
              this.liveRegion,
              null,
              "ui-helper-hidden-accessible"
            ),
            this._on(this.window, {
              beforeunload: function () {
                this.element.removeAttr("autocomplete");
              },
            });
        },
        _destroy: function () {
          clearTimeout(this.searching),
            this.element.removeAttr("autocomplete"),
            this.menu.element.remove(),
            this.liveRegion.remove();
        },
        _setOption: function (e, t) {
          this._super(e, t),
            "source" === e && this._initSource(),
            "appendTo" === e && this.menu.element.appendTo(this._appendTo()),
            "disabled" === e && t && this.xhr && this.xhr.abort();
        },
        _isEventTargetInWidget: function (t) {
          var n = this.menu.element[0];
          return (
            t.target === this.element[0] ||
            t.target === n ||
            e.contains(n, t.target)
          );
        },
        _closeOnClickOutside: function (e) {
          this._isEventTargetInWidget(e) || this.close();
        },
        _appendTo: function () {
          var t = this.options.appendTo;
          return (
            t &&
              (t = t.jquery || t.nodeType ? e(t) : this.document.find(t).eq(0)),
            (t && t[0]) || (t = this.element.closest(".ui-front, dialog")),
            t.length || (t = this.document[0].body),
            t
          );
        },
        _initSource: function () {
          var t,
            n,
            i = this;
          e.isArray(this.options.source)
            ? ((t = this.options.source),
              (this.source = function (n, i) {
                i(e.ui.autocomplete.filter(t, n.term));
              }))
            : "string" == typeof this.options.source
            ? ((n = this.options.source),
              (this.source = function (t, o) {
                i.xhr && i.xhr.abort(),
                  (i.xhr = e.ajax({
                    url: n,
                    data: t,
                    dataType: "json",
                    success: function (e) {
                      o(e);
                    },
                    error: function () {
                      o([]);
                    },
                  }));
              }))
            : (this.source = this.options.source);
        },
        _searchTimeout: function (e) {
          clearTimeout(this.searching),
            (this.searching = this._delay(function () {
              var t = this.term === this._value(),
                n = this.menu.element.is(":visible"),
                i = e.altKey || e.ctrlKey || e.metaKey || e.shiftKey;
              (!t || (t && !n && !i)) &&
                ((this.selectedItem = null), this.search(null, e));
            }, this.options.delay));
        },
        search: function (e, t) {
          return (
            (e = null != e ? e : this._value()),
            (this.term = this._value()),
            e.length < this.options.minLength
              ? this.close(t)
              : !1 !== this._trigger("search", t)
              ? this._search(e)
              : void 0
          );
        },
        _search: function (e) {
          this.pending++,
            this._addClass("ui-autocomplete-loading"),
            (this.cancelSearch = !1),
            this.source({ term: e }, this._response());
        },
        _response: function () {
          var t = ++this.requestIndex;
          return e.proxy(function (e) {
            t === this.requestIndex && this.__response(e),
              this.pending--,
              this.pending || this._removeClass("ui-autocomplete-loading");
          }, this);
        },
        __response: function (e) {
          e && (e = this._normalize(e)),
            this._trigger("response", null, { content: e }),
            !this.options.disabled && e && e.length && !this.cancelSearch
              ? (this._suggest(e), this._trigger("open"))
              : this._close();
        },
        close: function (e) {
          (this.cancelSearch = !0), this._close(e);
        },
        _close: function (e) {
          this._off(this.document, "mousedown"),
            this.menu.element.is(":visible") &&
              (this.menu.element.hide(),
              this.menu.blur(),
              (this.isNewMenu = !0),
              this._trigger("close", e));
        },
        _change: function (e) {
          this.previous !== this._value() &&
            this._trigger("change", e, { item: this.selectedItem });
        },
        _normalize: function (t) {
          return t.length && t[0].label && t[0].value
            ? t
            : e.map(t, function (t) {
                return "string" == typeof t
                  ? { label: t, value: t }
                  : e.extend({}, t, {
                      label: t.label || t.value,
                      value: t.value || t.label,
                    });
              });
        },
        _suggest: function (t) {
          var n = this.menu.element.empty();
          this._renderMenu(n, t),
            (this.isNewMenu = !0),
            this.menu.refresh(),
            n.show(),
            this._resizeMenu(),
            n.position(e.extend({ of: this.element }, this.options.position)),
            this.options.autoFocus && this.menu.next(),
            this._on(this.document, { mousedown: "_closeOnClickOutside" });
        },
        _resizeMenu: function () {
          var e = this.menu.element;
          e.outerWidth(
            Math.max(e.width("").outerWidth() + 1, this.element.outerWidth())
          );
        },
        _renderMenu: function (t, n) {
          var i = this;
          e.each(n, function (e, n) {
            i._renderItemData(t, n);
          });
        },
        _renderItemData: function (e, t) {
          return this._renderItem(e, t).data("ui-autocomplete-item", t);
        },
        _renderItem: function (t, n) {
          return e("<li>").append(e("<div>").text(n.label)).appendTo(t);
        },
        _move: function (e, t) {
          return this.menu.element.is(":visible")
            ? (this.menu.isFirstItem() && /^previous/.test(e)) ||
              (this.menu.isLastItem() && /^next/.test(e))
              ? (this.isMultiLine || this._value(this.term),
                void this.menu.blur())
              : void this.menu[e](t)
            : void this.search(null, t);
        },
        widget: function () {
          return this.menu.element;
        },
        _value: function () {
          return this.valueMethod.apply(this.element, arguments);
        },
        _keyEvent: function (e, t) {
          (!this.isMultiLine || this.menu.element.is(":visible")) &&
            (this._move(e, t), t.preventDefault());
        },
        _isContentEditable: function (e) {
          if (!e.length) return !1;
          var t = e.prop("contentEditable");
          return "inherit" === t
            ? this._isContentEditable(e.parent())
            : "true" === t;
        },
      }),
      e.extend(e.ui.autocomplete, {
        escapeRegex: function (e) {
          return e.replace(/[\-\[\]{}()*+?.,\\\^$|#\s]/g, "\\$&");
        },
        filter: function (t, n) {
          var i = RegExp(e.ui.autocomplete.escapeRegex(n), "i");
          return e.grep(t, function (e) {
            return i.test(e.label || e.value || e);
          });
        },
      }),
      e.widget("ui.autocomplete", e.ui.autocomplete, {
        options: {
          messages: {
            noResults: "No search results.",
            results: function (e) {
              return (
                e +
                (e > 1 ? " results are" : " result is") +
                " available, use up and down arrow keys to navigate."
              );
            },
          },
        },
        __response: function (t) {
          var n;
          this._superApply(arguments),
            this.options.disabled ||
              this.cancelSearch ||
              ((n =
                t && t.length
                  ? this.options.messages.results(t.length)
                  : this.options.messages.noResults),
              this.liveRegion.children().hide(),
              e("<div>").text(n).appendTo(this.liveRegion));
        },
      }),
      e.ui.autocomplete;
  });
