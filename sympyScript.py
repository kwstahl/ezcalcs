import sympy
import sys
import json
import SympyForms
from sympy import Symbol

test1 = SympyForms.Formula(sys.argv[1], sys.argv[2])
test1.substitute_values()
test1.solve_for_variable()
print(test1.converted_answer)