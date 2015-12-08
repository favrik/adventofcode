import multiprocessing as mp
import string
import hashlib

def check_hash_range(mine, start, stop):
    for x in range(start, stop):
        m = hashlib.md5('ckczppom' + str(x))
        digest = m.hexdigest()
        if digest[:len(mine)] == mine:
            return x

    return ''

def hash_miner(value):
    number_of_processes = mp.cpu_count() - 1
    pool = mp.Pool(number_of_processes)
    result = ''
    iteration_step = 1000000

    range_start = 1
    range_stop = number_of_processes + 1
    while result == '':
        processes = []

        for x in range(range_start, range_stop):
            stop = x * iteration_step
            start = stop - iteration_step + 1
            processes.append(pool.apply_async(check_hash_range, args=(value, start, stop)))

        results = [p.get() for p in processes]

        for x in results:
            if str(x):
                result = str(x)
                break

        if result:
            break

        range_start = range_stop
        range_stop += range_stop

    print(result)

if __name__ == '__main__':
    hash_miner('00000')
    hash_miner('000000')
