(ns clojure-solutions.02
  (:require [clojure-solutions.util :as util]
            [clojure.string :refer [split]]))

(defn parse-int [x] (Integer/parseInt x))

(def data
  (->> (util/input-seq "02")
       (map #(split % #"x"))
       (map #(map parse-int %))))


(defn calculate-area [v]
  (as-> v dims
    (partition 2 1 (conj (vec dims) (first dims)))
    (map (fn [[x y]] (* x y)) dims) ; can also use (map #(apply * %) dims)
    (reduce + (reduce min dims) (map #(* 2 %) dims))))

(def total-area
  (reduce + (map calculate-area data)))

(defn calculate-ribbon [v]
  (+ (* 2 (reduce + (take 2 (sort < v)))) (reduce * v)))

(def total-ribbon
  (reduce + (map calculate-ribbon data)))
