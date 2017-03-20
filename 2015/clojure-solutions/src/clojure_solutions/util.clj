(ns clojure-solutions.util
  (:require
   [clojure.java.io :as io]))

(def pwd (.getCanonicalPath (io/file "./src/clojure_solutions/")))

(defn input [file] (slurp (str pwd "/d" file ".input")))
