import sympy
import json
import collections

#named tuple to be used by generator iterate_variables()
Variable = collections.namedtuple("Variable", ["variable_name", "Value", "sympy_symbol", "unit_conversion"])

class Formula:
    def __init__(self, json_variable_array, formula_string):

        #turn json to dictionary from sys.argv[1]
        self.variable_array = json.loads(json_variable_array)

        #create and append sympy symbols
        for variable_name in self.variable_array:
            self.variable_array[variable_name]["sympy_symbol"] = sympy.Symbol(variable_name)
        
        #formula string comes from sys.argv[2]
        self.formula_string = formula_string
        self.sympy_equation = sympy.sympify(self.formula_string)

        #created during substitute_values() if "" found on "Value"
        self.variable_to_solve_for = ""

        #created during solve_for_variable()
        self.converted_answer = ""

    def generate_value_symbol_tuples(self):
        #generator function that creates named tuples for use in loops
        for variable_name in self.variable_array:
            variable_value = self.variable_array[variable_name]["Value"]
            sympy_symbol = self.variable_array[variable_name]["sympy_symbol"]
            unit_conversion = self.variable_array[variable_name]["unit_conversion"]
            yield Variable(variable_name, variable_value, sympy_symbol, unit_conversion)


    def substitute_values(self):
        #define the variable array, sympy equation from init for readability
        sympy_equation = self.sympy_equation
        for variable_name, variable_value, sympy_symbol, unit_conversion in self.generate_value_symbol_tuples():
            #loop through variable array and multiply values by conversion factors then substitute variables with this value
            if variable_value != "":
                float(unit_conversion)
                converted_variable_value = float(variable_value)*unit_conversion
                sympy_equation = sympy_equation.subs(sympy_symbol, converted_variable_value)
            else:
                self.variable_to_solve_for = Variable(variable_name, variable_value, sympy_symbol, unit_conversion)
        self.sympy_equation = sympy_equation


    def solve_for_variable(self):
        unit_conversion = self.variable_to_solve_for.unit_conversion
        equation = sympy.Eq(self.sympy_equation, 0)
        variable_to_solve_for = self.variable_to_solve_for.sympy_symbol

        #solve for missing variable, then divide by the unit conversion factor
        self.converted_answer = sympy.solve(equation, variable_to_solve_for)[0]*(unit_conversion)