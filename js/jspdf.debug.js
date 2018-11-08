(function (global, factory) {
    typeof exports === 'object' && typeof module !== 'undefined' ? module.exports = factory() :
    typeof define === 'function' && define.amd ? define(factory) :
    (global.jspdf = factory());
}(this, (function () { 'use strict';

var _typeof = typeof Symbol === "function" && typeof Symbol.iterator === "symbol" ? function (obj) {
  return typeof obj;
} : function (obj) {
  return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj;
};





var asyncGenerator = function () {
  function AwaitValue(value) {
    this.value = value;
  }

  function AsyncGenerator(gen) {
    var front, back;

    function send(key, arg) {
      return new Promise(function (resolve, reject) {
        var request = {
          key: key,
          arg: arg,
          resolve: resolve,
          reject: reject,
          next: null
        };

        if (back) {
          back = back.next = request;
        } else {
          front = back = request;
          resume(key, arg);
        }
      });
    }

    function resume(key, arg) {
      try {
        var result = gen[key](arg);
        var value = result.value;

        if (value instanceof AwaitValue) {
          Promise.resolve(value.value).then(function (arg) {
            resume("next", arg);
          }, function (arg) {
            resume("throw", arg);
          });
        } else {
          settle(result.done ? "return" : "normal", result.value);
        }
      } catch (err) {
        settle("throw", err);
      }
    }

    function settle(type, value) {
      switch (type) {
        case "return":
          front.resolve({
            value: value,
            done: true
          });
          break;

        case "throw":
          front.reject(value);
          break;

        default:
          front.resolve({
            value: value,
            done: false
          });
          break;
      }

      front = front.next;

      if (front) {
        resume(front.key, front.arg);
      } else {
        back = null;
      }
    }

    this._invoke = send;

    if (typeof gen.return !== "function") {
      this.return = undefined;
    }
  }

  if (typeof Symbol === "function" && Symbol.asyncIterator) {
    AsyncGenerator.prototype[Symbol.asyncIterator] = function () {
      return this;
    };
  }

  AsyncGenerator.prototype.next = function (arg) {
    return this._invoke("next", arg);
  };

  AsyncGenerator.prototype.throw = function (arg) {
    return this._invoke("throw", arg);
  };

  AsyncGenerator.prototype.return = function (arg) {
    return this._invoke("return", arg);
  };

  return {
    wrap: function (fn) {
      return function () {
        return new AsyncGenerator(fn.apply(this, arguments));
      };
    },
    await: function (value) {
      return new AwaitValue(value);
    }
  };
}();















var get$1 = function get$1(object, property, receiver) {
  if (object === null) object = Function.prototype;
  var desc = Object.getOwnPropertyDescriptor(object, property);

  if (desc === undefined) {
    var parent = Object.getPrototypeOf(object);

    if (parent === null) {
      return undefined;
    } else {
      return get$1(parent, property, receiver);
    }
  } else if ("value" in desc) {
    return desc.value;
  } else {
    var getter = desc.get;

    if (getter === undefined) {
      return undefined;
    }

    return getter.call(receiver);
  }
};

















var set$1 = function set$1(object, property, value, receiver) {
  var desc = Object.getOwnPropertyDescriptor(object, property);

  if (desc === undefined) {
    var parent = Object.getPrototypeOf(object);

    if (parent !== null) {
      set$1(parent, property, value, receiver);
    }
  } else if ("value" in desc && desc.writable) {
    desc.value = value;
  } else {
    var setter = desc.set;

    if (setter !== undefined) {
      setter.call(receiver, value);
    }
  }

  return value;
};

/** @preserve
 * jsPDF - PDF Document creation from JavaScript
 * Version 1.3.4 Built on 2017-04-10T14:14:44.483Z
 *                           CommitID cf4827d221
 *
 * Copyright (c) 2010-2016 James Hall <james@parall.ax>, https://github.com/MrRio/jsPDF
 *               2010 Aaron Spike, https://github.com/acspike
 *               2012 Willow Systems Corporation, willow-systems.com
 *               2012 Pablo Hess, https://github.com/pablohess
 *               2012 Florian Jenett, https://github.com/fjenett
 *               2013 Warren Weckesser, https://github.com/warrenweckesser
 *               2013 Youssef Beddad, https://github.com/lifof
 *               2013 Lee Driscoll, https://github.com/lsdriscoll
 *               2013 Stefan Slonevskiy, https://github.com/stefslon
 *               2013 Jeremy Morel, https://github.com/jmorel
 *               2013 Christoph Hartmann, https://github.com/chris-rock
 *               2014 Juan Pablo Gaviria, https://github.com/juanpgaviria
 *               2014 James Makes, https://github.com/dollaruw
 *               2014 Diego Casorran, https://github.com/diegocr
 *               2014 Steven Spungin, https://github.com/Flamenco
 *               2014 Kenneth Glassey, https://github.com/Gavvers
 *
 * Licensed under the MIT License
 *
 * Contributor(s):
 *    siefkenj, ahwolf, rickygu, Midnith, saintclair, eaparango,
 *    kim3er, mfo, alnorth, Flamenco
 */

/**
 * Creates new jsPDF document object instance.
 *
 * @class
 * @param orientation One of "portrait" or "landscape" (or shortcuts "p" (Default), "l")
 * @param unit        Measurement unit to be used when coordinates are specified.
 *                    One of "pt" (points), "mm" (Default), "cm", "in"
 * @param format      One of 'pageFormats' as shown below, default: a4
 * @returns {jsPDF}
 * @name jsPDF
 */
var jsPDF = function (global) {
  'use strict';

  var pdfVersion = '1.3',
      pageFormats = { // Size in pt of various paper formats
    'a0': [2383.94, 3370.39],
    'a1': [1683.78, 2383.94],
    'a2': [1190.55, 1683.78],
    'a3': [841.89, 1190.55],
    'a4': [595.28, 841.89],
    'a5': [419.53, 595.28],
    'a6': [297.64, 419.53],
    'a7': [209.76, 297.64],
    'a8': [147.40, 209.76],
    'a9': [104.88, 147.40],
    'a10': [73.70, 104.88],
    'b0': [2834.65, 4008.19],
    'b1': [2004.09, 2834.65],
    'b2': [1417.32, 2004.09],
    'b3': [1000.63, 1417.32],
    'b4': [708.66, 1000.63],
    'b5': [498.90, 708.66],
    'b6': [354.33, 498.90],
    'b7': [249.45, 354.33],
    'b8': [175.75, 249.45],
    'b9': [124.72, 175.75],
    'b10': [87.87, 124.72],
    'c0': [2599.37, 3676.54],
    'c1': [1836.85, 2599.37],
    'c2': [1298.27, 1836.85],
    'c3': [918.43, 1298.27],
    'c4': [649.13, 918.43],
    'c5': [459.21, 649.13],
    'c6': [323.15, 459.21],
    'c7': [229.61, 323.15],
    'c8': [161.57, 229.61],
    'c9': [113.39, 161.57],
    'c10': [79.37, 113.39],
    'dl': [311.81, 623.62],
    'letter': [612, 792],
    'government-letter': [576, 756],
    'legal': [612, 1008],
    'junior-legal': [576, 360],
    'ledger': [1224, 792],
    'tabloid': [792, 1224],
    'credit-card': [153, 243]
  };

  /**
   * jsPDF's Internal PubSub Implementation.
   * See mrrio.github.io/jsPDF/doc/symbols/PubSub.html
   * Backward compatible rewritten on 2014 by
   * Diego Casorran, https://github.com/diegocr
   *
   * @class
   * @name PubSub
   * @ignore This should not be in the public docs.
   */
  function PubSub(context) {
    var topics = {};

    this.subscribe = function (topic, callback, once) {
      if (typeof callback !== 'function') {
        return false;
      }

      if (!topics.hasOwnProperty(topic)) {
        topics[topic] = {};
      }

      var id = Math.random().toString(35);
      topics[topic][id] = [callback, !!once];

      return id;
    };

    this.unsubscribe = function (token) {
      for (var topic in topics) {
        if (topics[topic][token]) {
          delete topics[topic][token];
          return true;
        }
      }
      return false;
    };

    this.publish = function (topic) {
      if (topics.hasOwnProperty(topic)) {
        var args = Array.prototype.slice.call(arguments, 1),
            idr = [];

        for (var id in topics[topic]) {
          var sub = topics[topic][id];
          try {
            sub[0].apply(context, args);
          } catch (ex) {
            if (global.console) {
              console.error('jsPDF PubSub Error', ex.message, ex);
            }
          }
          if (sub[1]) idr.push(id);
        }
        if (idr.length) idr.forEach(this.unsubscribe);
      }
    };
  }

  /**
   * @constructor
   * @private
   */
  function jsPDF(orientation, unit, format, compressPdf) {
    var options = {};

    if ((typeof orientation === 'undefined' ? 'undefined' : _typeof(orientation)) === 'object') {
      options = orientation;

      orientation = options.orientation;
      unit = options.unit || unit;
      format = options.format || format;
      compressPdf = options.compress || options.compressPdf || compressPdf;
    }

    // Default options
    unit = unit || 'mm';
    format = format || 'a4';
    orientation = ('' + (orientation || 'P')).toLowerCase();

    var format_as_string = ('' + format).toLowerCase(),
        compress = !!compressPdf && typeof Uint8Array === 'function',
        textColor = options.textColor || '0 g',
        drawColor = options.drawColor || '0 G',
        activeFontSize = options.fontSize || 16,
        lineHeightProportion = options.lineHeight || 1.15,
        lineWidth = options.lineWidth || 0.200025,
        // 2mm
    objectNumber = 2,
        // 'n' Current object number
    outToPages = !1,
        // switches where out() prints. outToPages true = push to pages obj. outToPages false = doc builder content
    offsets = [],
        // List of offsets. Activated and reset by buildDocument(). Pupulated by various calls buildDocument makes.
    fonts = {},
        // collection of font objects, where key is fontKey - a dynamically created label for a given font.
    fontmap = {},
        // mapping structure fontName > fontStyle > font key - performance layer. See addFont()
    activeFontKey,
        // will be string representing the KEY of the font as combination of fontName + fontStyle
    k,
        // Scale factor
    tmp,
        page = 0,
        currentPage,
        pages = [],
        pagesContext = [],
        // same index as pages and pagedim
    pagedim = [],
        content = [],
        additionalObjects = [],
        lineCapID = 0,
        lineJoinID = 0,
        content_length = 0,
        pageWidth,
        pageHeight,
        pageMode,
        zoomMode,
        layoutMode,
        documentProperties = {
      'title': '',
      'subject': '',
      'author': '',
      'keywords': '',
      'creator': ''
    },
        API = {},
        events = new PubSub(API),


    /////////////////////
    // Private functions
    /////////////////////
    f2 = function f2(number) {
      return number.toFixed(2); // Ie, %.2f
    },
        f3 = function f3(number) {
      return number.toFixed(3); // Ie, %.3f
    },
        padd2 = function padd2(number) {
      return ('0' + parseInt(number)).slice(-2);
    },
        out = function out(string) {
      if (outToPages) {
        /* set by beginPage */
        pages[currentPage].push(string);
      } else {
        // +1 for '\n' that will be used to join 'content'
        content_length += string.length + 1;
        content.push(string);
      }
    },
        newObject = function newObject() {
      // Begin a new object
      objectNumber++;
      offsets[objectNumber] = content_length;
      out(objectNumber + ' 0 obj');
      return objectNumber;
    },

    // Does not output the object until after the pages have been output.
    // Returns an object containing the objectId and content.
    // All pages have been added so the object ID can be estimated to start right after.
    // This does not modify the current objectNumber;  It must be updated after the newObjects are output.
    newAdditionalObject = function newAdditionalObject() {
      var objId = pages.length * 2 + 1;
      objId += additionalObjects.length;
      var obj = {
        objId: objId,
        content: ''
      };
      additionalObjects.push(obj);
      return obj;
    },

    // Does not output the object.  The caller must call newObjectDeferredBegin(oid) before outputing any data
    newObjectDeferred = function newObjectDeferred() {
      objectNumber++;
      offsets[objectNumber] = function () {
        return content_length;
      };
      return objectNumber;
    },
        newObjectDeferredBegin = function newObjectDeferredBegin(oid) {
      offsets[oid] = content_length;
    },
        putStream = function putStream(str) {
      out('stream');
      out(str);
      out('endstream');
    },
        putPages = function putPages() {
      var n,
          p,
          arr,
          i,
          deflater,
          adler32,
          adler32cs,
          wPt,
          hPt,
          pageObjectNumbers = [];

      adler32cs = global.adler32cs || jsPDF.adler32cs;
      if (compress && typeof adler32cs === 'undefined') {
        compress = false;
      }

      // outToPages = false as set in endDocument(). out() writes to content.

      for (n = 1; n <= page; n++) {
        pageObjectNumbers.push(newObject());
        wPt = (pageWidth = pagedim[n].width) * k;
        hPt = (pageHeight = pagedim[n].height) * k;
        out('<</Type /Page');
        out('/Parent 1 0 R');
        out('/Resources 2 0 R');
        out('/MediaBox [0 0 ' + f2(wPt) + ' ' + f2(hPt) + ']');
        // Added for annotation plugin
        events.publish('putPage', {
          pageNumber: n,
          page: pages[n]
        });
        out('/Contents ' + (objectNumber + 1) + ' 0 R');
        out('>>');
        out('endobj');

        // Page content
        p = pages[n].join('\n');
        newObject();
        if (compress) {
          arr = [];
          i = p.length;
          while (i--) {
            arr[i] = p.charCodeAt(i);
          }
          adler32 = adler32cs.from(p);
          deflater = new Deflater(6);
          deflater.append(new Uint8Array(arr));
          p = deflater.flush();
          arr = new Uint8Array(p.length + 6);
          arr.set(new Uint8Array([120, 156])), arr.set(p, 2);
          arr.set(new Uint8Array([adler32 & 0xFF, adler32 >> 8 & 0xFF, adler32 >> 16 & 0xFF, adler32 >> 24 & 0xFF]), p.length + 2);
          p = String.fromCharCode.apply(null, arr);
          out('<</Length ' + p.length + ' /Filter [/FlateDecode]>>');
        } else {
          out('<</Length ' + p.length + '>>');
        }
        putStream(p);
        out('endobj');
      }
      offsets[1] = content_length;
      out('1 0 obj');
      out('<</Type /Pages');
      var kids = '/Kids [';
      for (i = 0; i < page; i++) {
        kids += pageObjectNumbers[i] + ' 0 R ';
      }
      out(kids + ']');
      out('/Count ' + page);
      out('>>');
      out('endobj');
      events.publish('postPutPages');
    },
        putFont = function putFont(font) {
      font.objectNumber = newObject();
      out('<</BaseFont/' + font.PostScriptName + '/Type/Font');
      if (typeof font.encoding === 'string') {
        out('/Encoding/' + font.encoding);
      }
      out('/Subtype/Type1>>');
      out('endobj');
    },
        putFonts = function putFonts() {
      for (var fontKey in fonts) {
        if (fonts.hasOwnProperty(fontKey)) {
          putFont(fonts[fontKey]);
        }
      }
    },
        putXobjectDict = function putXobjectDict() {
      // Loop through images, or other data objects
      events.publish('putXobjectDict');
    },
        putResourceDictionary = function putResourceDictionary() {
      out('/ProcSet [/PDF /Text /ImageB /ImageC /ImageI]');
      out('/Font <<');

      // Do this for each font, the '1' bit is the index of the font
      for (var fontKey in fonts) {
        if (fonts.hasOwnProperty(fontKey)) {
          out('/' + fontKey + ' ' + fonts[fontKey].objectNumber + ' 0 R');
        }
      }
      out('>>');
      out('/XObject <<');
      putXobjectDict();
      out('>>');
    },
        putResources = function putResources() {
      putFonts();
      events.publish('putResources');
      // Resource dictionary
      offsets[2] = content_length;
      out('2 0 obj');
      out('<<');
      putResourceDictionary();
      out('>>');
      out('endobj');
      events.publish('postPutResources');
    },
        putAdditionalObjects = function putAdditionalObjects() {
      events.publish('putAdditionalObjects');
      for (var i = 0; i < additionalObjects.length; i++) {
        var obj = additionalObjects[i];
        offsets[obj.objId] = content_length;
        out(obj.objId + ' 0 obj');
        out(obj.content);
        out('endobj');
      }
      objectNumber += additionalObjects.length;
      events.publish('postPutAdditionalObjects');
    },
        addToFontDictionary = function addToFontDictionary(fontKey, fontName, fontStyle) {
      // this is mapping structure for quick font key lookup.
      // returns the KEY of the font (ex: "F1") for a given
      // pair of font name and type (ex: "Arial". "Italic")
      if (!fontmap.hasOwnProperty(fontName)) {
        fontmap[fontName] = {};
      }
      fontmap[fontName][fontStyle] = fontKey;
    },

    /**
     * FontObject describes a particular font as member of an instnace of jsPDF
     *
     * It's a collection of properties like 'id' (to be used in PDF stream),
     * 'fontName' (font's family name), 'fontStyle' (font's style variant label)
     *
     * @class
     * @public
     * @property id {String} PDF-document-instance-specific label assinged to the font.
     * @property PostScriptName {String} PDF specification full name for the font
     * @property encoding {Object} Encoding_name-to-Font_metrics_object mapping.
     * @name FontObject
     * @ignore This should not be in the public docs.
     */
    addFont = function addFont(PostScriptName, fontName, fontStyle, encoding) {
      var fontKey = 'F' + (Object.keys(fonts).length + 1).toString(10),

      // This is FontObject
      font = fonts[fontKey] = {
        'id': fontKey,
        'PostScriptName': PostScriptName,
        'fontName': fontName,
        'fontStyle': fontStyle,
        'encoding': encoding,
        'metadata': {}
      };
      addToFontDictionary(fontKey, fontName, fontStyle);
      events.publish('addFont', font);

      return fontKey;
    },
        addFonts = function addFonts() {

      var HELVETICA = "helvetica",
          TIMES = "times",
          COURIER = "courier",
          NORMAL = "normal",
          BOLD = "bold",
          ITALIC = "italic",
          BOLD_ITALIC = "bolditalic",
          encoding = 'StandardEncoding',
          ZAPF = "zapfdingbats",
          standardFonts = [['Helvetica', HELVETICA, NORMAL], ['Helvetica-Bold', HELVETICA, BOLD], ['Helvetica-Oblique', HELVETICA, ITALIC], ['Helvetica-BoldOblique', HELVETICA, BOLD_ITALIC], ['Courier', COURIER, NORMAL], ['Courier-Bold', COURIER, BOLD], ['Courier-Oblique', COURIER, ITALIC], ['Courier-BoldOblique', COURIER, BOLD_ITALIC], ['Times-Roman', TIMES, NORMAL], ['Times-Bold', TIMES, BOLD], ['Times-Italic', TIMES, ITALIC], ['Times-BoldItalic', TIMES, BOLD_ITALIC], ['ZapfDingbats', ZAPF]];

      for (var i = 0, l = standardFonts.length; i < l; i++) {
        var fontKey = addFont(standardFonts[i][0], standardFonts[i][1], standardFonts[i][2], encoding);

        // adding aliases for standard fonts, this time matching the capitalization
        var parts = standardFonts[i][0].split('-');
        addToFontDictionary(fontKey, parts[0], parts[1] || '');
      }
      events.publish('addFonts', {
        fonts: fonts,
        dictionary: fontmap
      });
    },
        SAFE = function __safeCall(fn) {
      fn.foo = function __safeCallWrapper() {
        try {
          return fn.apply(this, arguments);
        } catch (e) {
          var stack = e.stack || '';
          if (~stack.indexOf(' at ')) stack = stack.split(" at ")[1];
          var m = "Error in function " + stack.split("\n")[0].split('<')[0] + ": " + e.message;
          if (global.console) {
            global.console.error(m, e);
            if (global.alert) alert(m);
          } else {
            throw new Error(m);
          }
        }
      };
      fn.foo.bar = fn;
      return fn.foo;
    },
        to8bitStream = function to8bitStream(text, flags) {
      /**
       * PDF 1.3 spec:
       * "For text strings encoded in Unicode, the first two bytes must be 254 followed by
       * 255, representing the Unicode byte order marker, U+FEFF. (This sequence conflicts
       * with the PDFDocEncoding character sequence thorn ydieresis, which is unlikely
       * to be a meaningful beginning of a word or phrase.) The remainder of the
       * string consists of Unicode character codes, according to the UTF-16 encoding
       * specified in the Unicode standard, version 2.0. Commonly used Unicode values
       * are represented as 2 bytes per character, with the high-order byte appearing first
       * in the string."
       *
       * In other words, if there are chars in a string with char code above 255, we
       * recode the string to UCS2 BE - string doubles in length and BOM is prepended.
       *
       * HOWEVER!
       * Actual *content* (body) text (as opposed to strings used in document properties etc)
       * does NOT expect BOM. There, it is treated as a literal GID (Glyph ID)
       *
       * Because of Adobe's focus on "you subset your fonts!" you are not supposed to have
       * a font that maps directly Unicode (UCS2 / UTF16BE) code to font GID, but you could
       * fudge it with "Identity-H" encoding and custom CIDtoGID map that mimics Unicode
       * code page. There, however, all characters in the stream are treated as GIDs,
       * including BOM, which is the reason we need to skip BOM in content text (i.e. that
       * that is tied to a font).
       *
       * To signal this "special" PDFEscape / to8bitStream handling mode,
       * API.text() function sets (unless you overwrite it with manual values
       * given to API.text(.., flags) )
       * flags