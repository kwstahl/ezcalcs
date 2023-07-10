import sympy
import sys
import json
import SympyForms
from sympy import Symbol

#sample json data {"A":{"Value":1, "unit_conversion":"dank"}, "B":{"Value":"none", "unit_conversion":"cheese"}, "C":{"Value":2, "unit_conversion":"blop"}}


test1 = SympyForms.Formula(sys.argv[1], sys.argv[2])
test1.substitute_values()
test1.solve_for_variable()
print(test1.converted_answer)


#python3 /workspaces/ezcalcs/sympyScript.py '{"A":{"Value":1, "unit_conversion":2}, "B":{"Value":"none", "unit_conversion":3}, "C":{"Value":2, "unit_conversion":3}}' 'A=B+C'

'{"A":{"Value":1, "unit_conversion":2}, "B":{"Value":"none", "unit_conversion":3}, "C":{"Value":2, "unit_conversion":3}}' 'A-B+C' 