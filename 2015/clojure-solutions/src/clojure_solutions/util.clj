(ns clojure-solutions.util
  (:require
   [clojure.java.io :as io]))

(def pwd (.getCanonicalPath (io/file "./src/clojure_solutions/")))

(defn problem-file [file] (str pwd "/d" file ".input"))

(defn input [file] (slurp (problem-file file)))

(defn input-seq [file] (line-seq (io/reader (problem-file file))))
