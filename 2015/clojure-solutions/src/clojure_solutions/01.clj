(ns clojure-solutions.01
  (:require [clojure-solutions.util :as util]))

(def data
  (->> (util/input "01")
       (map #(if (= % \() 1 -1))))

(def final-floor
  (->> data
       (reduce +)))

(defn base [acc x]
  (if (= (nth acc 1) -1)
    (reduced (nth acc 0))
    (assoc acc 0 (nth x 0) 1 (+ (nth acc 1) (nth x 1)))))

(def at-basement
  (->> data
       (map-indexed vector)
       (reduce base)
       inc))


