function areBracketsBalanced(input) {
  const text = String(input ?? "");

  const openers = new Set(["(", "{", "["]);
  const pairs = new Map([
    [")", "("],
    ["}", "{"],
    ["]", "["],
  ]);

  const stack = [];

  for (const char of text) {
    if (openers.has(char)) {
      stack.push(char);
      continue;
    }

    const expectedOpener = pairs.get(char);
    if (!expectedOpener) continue;

    const last = stack.pop();
    if (last !== expectedOpener) return false;
  }

  return stack.length === 0;
}

if (require.main === module) {
  const samples = ["(a + b) * (c - d)", "([)]", "([]{})", "(()", "sin parentesis"];
  for (const s of samples) {
    console.log(JSON.stringify({ input: s, balanced: areBracketsBalanced(s) }));
  }
}

module.exports = { areBracketsBalanced };

