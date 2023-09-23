import sympy
import sys
import json
import SympyForms
from sympy import Symbol

#python3 /var/www/html/ezcalcs/sympyScript.py '{"A":{"Value":1, "unit_conversion":4}, "B":{"Value":"none", "unit_conversion":2}, "C":{"Value":2, "unit_conversion":"1"}}' 'A-B-C'
test1 = SympyForms.Formula(sys.argv[1], sys.argv[2])
test1.substitute_converted_values()
test1.solve_for_variable()
print(test1.converted_answer)

